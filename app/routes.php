<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('home.index');
}));



Route::group(array('prefix' => 'v1'), function()
{
	Route::resource('groups', 'V1\GroupsController');
	Route::resource('attendances', 'V1\AttendancesController');
	Route::resource('statuses', 'V1\StatusesController');
});