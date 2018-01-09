<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListController extends Controller
{
	public function index()
	{
		$candidates = Listing::all();
		return view('users.candidatesList', compact('candidates'));
	}
}