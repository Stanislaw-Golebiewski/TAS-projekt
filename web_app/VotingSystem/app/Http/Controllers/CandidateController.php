<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'born' => 'required|string|max:4', 'regex:/^[1-9][0-9]{3}$/',
            'school' => 'required|string|max:50',
            'fraction' => 'required|string|max:80',
            'numberonlist' => 'required|unique:candidates|string|max:2',
        ]);
    }

	public function add(Request $request)
	{
	    $user = new Candidate();
        $now = Carbon::now();
        $now->year;
	    $user->name = $request->input('name');
	    $user->surname = $request->input('surname');
	    $user->born = $request->input('born');
	    $user->school = $request->school;
	    $user->fraction = $request->input('fraction');
	    $user->numberonlist = $request->input('numberonlist');
        if ($user->school == "Wybierz wykształcenie" or $user->numberonlist >= 16 or ($now->year - $user->born <= 22))
        {
            return view('error');
        }
		$user->votes = 0;
	    $user->save();

	    return view('admin');
	}

    public function welcome()
    {
    	return view('users.candidates');
    }
}
