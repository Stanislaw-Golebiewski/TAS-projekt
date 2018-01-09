<?php

namespace App\Http\Controllers\Auth;

use App\User;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $client = new Client();

        if(array_key_exists('root',$data))
        {
            if($data['root'] == 'on')
            {      
                $r = $client->request('POST', 'http://vps487563.ovh.net:8080/api/v1/sessions?username=admin&password=d36d19a3-246b-45ef-9038-18de737b103e');

                // NIE UTRZYMUJE SESJI $r = $client->request('POST', 'http://vps487563.ovh.net:8080/api/v1/collections/users?username=ppodolski&password=3thof04#&role=wyborca');
                return Admin::create([
                  'name' => $data['name'],
                  'email' => $data['email'],
                  'password' => bcrypt($data['password']),
                  'title' => $data['role'],
                ]);
            }
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
