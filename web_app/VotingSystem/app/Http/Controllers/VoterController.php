<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function welcome()
    {
    	return view('users.voters');
    }
}
