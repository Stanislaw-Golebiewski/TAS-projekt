<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'born' => 'required|string|max:4',
            'school' => 'required|string|max:50',
            'fraction' => 'required|string|max:80',
        ]);
    }

	public function add(Request $request)
	{
	    $user = new Candidate();
	    $user->name = $request->input('name');
	    $user->surname = $request->input('surname');
	    $user->born = $request->input('born');
	    $user->school = $request->school;
	    $user->fraction = $request->input('fraction');
	    $user->numberonlist = rand(1,15);
	    $user->save();

	    return view('admin');
	}

    public function welcome()
    {
    	return view('users.candidates');
    }
}
