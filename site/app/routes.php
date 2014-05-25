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


# All ajax routes
Route::group(['prefix'=>'api', 'before'=>'ajax'], function()
{
	# All none authenticated ajax routes
	Route::group(['before'=>'guest'], function()
	{
		Route::controller('auth', 'api\ApiAuthController');
	});

	# All authenticated ajax routes
	Route::group(['before'=>'auth'], function()
	{
		Route::controller('search', 'api\ApiSearchController');
		Route::controller('profile', 'api\ApiProfileController');
		Route::controller('user-profile', 'api\ApiUserProfileController');
	});
});

# All authenticated base routes
Route::group(['before'=>'auth'], function()
{
	Route::controller('home', 'HomeController');
	Route::controller('profile', 'ProfileController');
	Route::controller('user-profile', 'UserProfileController');
	Route::controller('messages', 'MessageController');
	Route::controller('search', 'SearchController');
	Route::controller('signout', 'SignOutController');
});

# All none authenticated base routes
Route::group(['before'=>'guest'], function()
{
	Route::controller('/', 'AuthController');
});

