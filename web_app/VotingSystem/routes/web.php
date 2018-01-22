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

  Route::get('/voteforuserinvoting/{id}', 'ListController@votelist');
  Route::get('/results', 'ListController@results');
});

Route::get('/lists', 'VotingController@showlists');
Route::post('/vote', 'VotingController@vote')->name('voting.vote');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('admin.login');
Route::get('/voteforuserinvoting/{id}', 'VotingController@votelist');

Route::prefix('admin')->group(function()
{
  Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

  Route::get('/addvoting', function(){return view('vote.addvoting');})->name('admin.addVotingForm');
  Route::post('/addvoting', 'ListController@addVoting')->name('admin.addVoting');

  Route::get('/preparevoting', 'ListController@prepareVotingForm')->name('admin.prepareVotingForm');
  Route::post('/preparevoting', 'ListController@prepareVoting')->name('admin.prepareVoting');

  Route::get('/addfraction', function() { return view('vote.addfraction');});
  Route::post('/addfraction', 'ListController@addFraction')->name('admin.addFraction');

	Route::get('/addcandidate','CandidateController@welcome')->name('admin.welcome');
	Route::post('/addcandidate','CandidateController@add')->name('admin.add');

  Route::get('/addcandidatesto','ListController@addCandidatesTo');
  Route::post('/addcanidatestovoting', 'ListController@addCandidatesToVoting')->name('voting.addCandidateTo');
  Route::post('/choosefractionandnumberonlist', 'ListController@chooseFractionAndNumberOnList')->name('voting.chooseFractionAndNumberOnList');

	Route::get('/addvoter','VoterController@welcome')->name('admin.welcome');
	Route::post('/addvoter','VoterController@store')->name('admin.store');
});
