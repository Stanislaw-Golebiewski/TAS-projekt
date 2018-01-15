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
	public function votelist()
	{
		$candidates = Listing::all();
		return view('vote.votecandidate', compact('candidates'));
	}
	public function results()
	{
		$candidates = Listing::all();
		return view('vote.results', compact('candidates'));
	}
}