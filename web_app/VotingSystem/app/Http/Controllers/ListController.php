<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use DB;
use Auth;

class ListController extends Controller
{
	public function index()
	{
		$candidates = Listing::all();
		return view('users.candidatesList', compact('candidates'));
	}

	public function addCandidate()
	{
		#$candidates = Listing::all();
		$candidates = DB::select('SELECT * FROM candidatesInfo');
		$votings = DB::select('SELECT id, name FROM voting');
		$fractions = DB::select('SELECT id,name,shortName FROM fractions');
		return view('vote.addcandidate', compact('candidates','votings','fractions'));
	}

	public function addCandidateTo(Request $request)
	{
		return 'ok';
	}

	public function chooseFractionAndNumberOnList(Request $request)
	{
		$candidates = [];
		foreach ($request->input('choose') as $candidate)
		{
			$candidates[] = get_object_vars((DB::select('SELECT * FROM candidatesInfo WHERE id = '.$candidate ))[0]);
		}
		$voting = DB::select('SELECT id, name FROM voting WHERE id = 1');
		$voting = $voting[0];
		$fractions = DB::select('SELECT id,name,shortName FROM fractions');
		return view('vote.chooseFractionAndNumberOnList', compact('candidates','voting','fractions'));
	}

	public function votelist($data)
	{
		#$candidates = Listing::all();
		$candidates = DB::select('SELECT * FROM candidates INNER JOIN candidatesInfo ON candidates.idCandidate = candidatesInfo.id WHERE candidates.idCandidate = '.$data[0]);
		$candidates = $candidates;
		$voting = $data[0];
		return view('vote.votecandidate', compact('candidates','voting'));
	}

	public function vote(Request $request)
	{
		if($request->input('choose') == '')
		{
			$errorInfo = "Nie wybrano kandydata!";
			return view('vote.error',compact('errorInfo'));
		}
		$userId = Auth::id();
		$votedIn = DB::select('SELECT idVoting FROM votedin WHERE idVoter = '.$userId);
		//$votedIn = json_decode(json_encode($votedIn),true);
		foreach ($votedIn as $vote) {
			$vote = get_object_vars($vote);
			if($vote['idVoting'] == $request->input('voting'))
			{
				$errorInfo = "Już zagłosowano!";
				return view('vote.error',compact('errorInfo'));
			}
		}
		if($userId == "")
		{
				return "Error#01";
		}
		DB::table('votedin')->insert(
			['idVoting' => $request->input('voting'), 'idVoter' => $userId]
		);
		return view('vote.ok');
	}

	public function results()
	{
		$candidates = Listing::all();
		return view('vote.results', compact('candidates'));
	}

	public function showlists()
	{
		$lists = DB::select('SELECT * FROM voting');
		return view('lists',compact('lists'));
	}
}
