<?php

namespace App\Http\Controllers;

use App\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'passport' => 'required|string|max:12',
        ]);
    }

    public function store(Request $request)
    {
        $user = new Voter();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->born = $request->input('born');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input(['password']));
        $user->passport = $request->input('passport');
        $user->save();

        return view('admin');
    }
    public function welcome()
    {
    	return view('users.voters');
    }
}
