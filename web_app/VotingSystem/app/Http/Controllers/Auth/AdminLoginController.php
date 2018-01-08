<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin',['except' => ['logout']]);
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

        $client = new Client();
        $res = $client->request('POST', 'http://vps487563.ovh.net:8080/api/v1/sessions?username=admin&password=d36d19a3-246b-45ef-9038-18de737b103e');
        //echo $res->getStatusCode();
            // "200"
        //echo $res->getHeader('content-type');
            // 'application/json; charset=utf8'
        //echo $res->getBody();
    	//próba logowania
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
		{
			//true
            return redirect()->intended(route('admin.dashboard'));
		}
			//false
			return redirect()->back()->withInput($request->only('email','remember'));
    	
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}

