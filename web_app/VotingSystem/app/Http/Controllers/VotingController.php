<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'startDate' => 'required|string|max:8',
            'endDate' => 'required|string|max:8',
        ]);
    }

    public function store(Request $request)
    {
        $user = new Voting();
        $user->name = $request->input('name');
        $user->startDate = $request->input('startDate');
        $user->endDate = $request->input('endDate');
        $user->save();

        return view('admin');
    }
    public function welcome()
    {
      return view('vote.add');
    }
}
