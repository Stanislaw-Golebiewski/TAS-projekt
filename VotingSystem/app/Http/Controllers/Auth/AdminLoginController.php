<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin');
	}
    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }
    public function login(Request $request)
    {
    	//validate
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);
    	//próba logowania
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
		{
			//true
			return redirect()->intended(route('admin.dashboard'));
		}
			//false
			return redirect()->back()->withInput($request->only('email','remember'));
    	
    }
}

