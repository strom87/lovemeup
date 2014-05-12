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

Route::controller('home', 'HomeController');

Route::group(['before'=>'guest'], function()
{
	Route::get('/', 'AuthController@getIndex');
});

Route::group(['prefix'=>'api', 'before'=>'ajax'], function()
{
	Route::group(['before'=>'guest'], function()
	{
		Route::controller('auth', 'api\AuthController');
	});
});



