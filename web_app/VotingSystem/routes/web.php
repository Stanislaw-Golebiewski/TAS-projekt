<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('debug')->group(function()
{
  Route::get('/overview', function () {
      return view('overview');
  });

  Route::get('/addcandidate', function () {
      return view('users.candidates');
  });

  Route::get('/addvoter', function () {
      return view('users.voters');
  });

  Route::get('/candidates', 'ListController@index');

  Route::get('/lists', function () {
      return view('lists');
  });

  Route::get('/addvote', function () {
      return view('vote.add');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('admin.login');

Route::prefix('admin')->group(function()
{
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/addcandidate','CandidateController@welcome')->name('admin.welcome');
	Route::post('/addcandidate','CandidateController@add')->name('admin.add');
	Route::get('/addvoter','VoterController@welcome')->name('admin.welcome');
	Route::post('/addvoter','VoterController@store')->name('admin.store');
});
