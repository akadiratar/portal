<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		return Redirect::guest('giris');
	}
});

Route::filter('yonetici', function()
{
	if (Auth::User()->yonetici_tip <> 1){
		return View::make("yonetim.403");
	}
});

Route::filter('gecici', function()
{
	if (Auth::User()->yonetici_tip == 2||Auth::User()->yonetici_tip == 3){
		return View::make("yonetim.403");
	}
});

Route::filter('ziyaretci', function()
{
	if (Auth::User()->yonetici_tip == 3){
		return View::make("yonetim.403");
	}
});

Route::filter('kilit', function()
{
	$kilit = Kilit::where("id", "1")->first();
	if ($kilit->kilit == 0)
	{
		return View::make("yonetim.hata");
	}
});



Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});



// App::missing(function($exception)
// {
//     return View::make("yonetim.404");
// });


// App::error(function($exception)
// {
//     return View::make("yonetim.404");
// });
