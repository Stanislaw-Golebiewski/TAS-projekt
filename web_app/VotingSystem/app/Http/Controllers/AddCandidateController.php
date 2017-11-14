<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCandidateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function addcandidate()
    {
    	return view('users.candidates');
    }
}
