<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use DB;

class ListController extends Controller
{
	public function index()
	{
		$candidates = Listing::all();
		return view('users.candidatesList', compact('candidates'));
	}
	public function votelist($id)
	{
		#toDo: podmiana id na nazwę z bazy
		$users = DB::select('SELECT idCandidatesList FROM voting WHERE id = '.$id);
		$users = explode(',', $users[0]->idCandidatesList);
		$candidates = array();
		foreach ($users as $user)
		{
			$candidate = DB::select('SELECT * FROM candidates WHERE id = '.$user);
			array_push($candidates,$candidate[0]);
		}
		$votingName = DB::select('SELECT name FROM voting WHERE id = '.$id);
		return view('vote.votecandidate', compact('candidates','votingName'));
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
