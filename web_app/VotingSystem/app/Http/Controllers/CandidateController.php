<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function welcome()
    {
    	return view('users.candidates');
    }
}
