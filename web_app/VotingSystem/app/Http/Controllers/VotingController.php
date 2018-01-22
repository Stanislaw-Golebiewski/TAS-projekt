<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class VotingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'startDate' => 'required|string|max:8',
    //         'endDate' => 'required|string|max:8',
    //     ]);
    // }
    //
    // public function store(Request $request)
    // {
    //     $user = new Voting();
    //     $user->name = $request->input('name');
    //     $user->startDate = $request->input('startDate');
    //     $user->endDate = $request->input('endDate');
    //     $user->save();
    //
    //     return view('admin');
    // }
    // public function welcome()
    // {
    //   return view('vote.add');
    // }

    public function votelist($data)
  	{
  		#$candidates = Listing::all();
      if(!Auth::guard())
      {
        return redirect ('/');
      }

  		$candidates = DB::select('SELECT candidatesinfo.id as id, candidatesinfo.name as name, candidatesinfo.surname, candidatesinfo.born as born, candidatesinfo.school as school, fractions.name as fraction, candidates.numberonlist as numberonlist
        FROM candidates
        INNER JOIN candidatesinfo ON candidates.idCandidate = candidatesinfo.id
        INNER JOIN fractions ON candidates.fraction = fractions.id
        WHERE candidates.idVoting = '.addslashes($data)
      );
  		$voting = $data;
  		return view('vote.votecandidate', compact('candidates','voting'));
  	}

  	public function vote(Request $request)
  	{
      if(!Auth::guard())
      {
        return redirect ('/');
      }

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
  				return "Error#01 - Nie jesteś zalogowany";
  		}

      //exec('');

  		DB::table('votedin')->insert(
  			['idVoting' => $request->input('voting'), 'idVoter' => $userId]
  		);

  		$info = "Pomyślnie zagłosowano!";
  		return view('vote.ok',compact('info'));
  	}

  	public function results()
  	{
  		$candidates = Listing::all();
  		return view('vote.results', compact('candidates'));
  	}

  	public function showlists()
  	{
      date_default_timezone_set('Europe/Warsaw');
  		$lists = DB::select('SELECT * FROM voting WHERE startDate >= '.date('Y-m-d')); //.' AND endDate <= '.date('Y-m-d'));
  		return view('lists',compact('lists'));
  	}
}
