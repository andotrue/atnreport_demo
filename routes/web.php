<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//認証周りを有効にする
Auth::routes();

Route::get('/tool/login', 'Auth\LoginController@showLoginForm');
Route::group(['middleware' => 'auth.tool'], function()
{
	Route::get('/tool', 'HomeController@index');
	Route::post("tool/user/testmailaddress_add/","Tool\UserController@testmailaddress_add");
	Route::get("tool/user/testmailaddress_del/{id}","Tool\UserController@testmailaddress_del");
	Route::resource("tool/user","Tool\UserController");
	Route::get("tool/information/copy/{id}","Tool\InformationController@copy");
	Route::resource("tool/information","Tool\InformationController");
	
	Route::resource("tool/store","Tool\StoreController");
	Route::resource("tool/image","Tool\ImageController");

	Route::any("tool/accesslog/forcontents/{no}","Tool\AccesslogController@forContents");
	Route::any("tool/accesslog/forstore/","Tool\AccesslogController@forStore");
	Route::resource("tool/accesslog","Tool\AccesslogController");
});
//Route::resource("tool/user","Tool\UserController");
//Route::resource("tool/information","Tool\InformationController");
//Route::resource("tool/store","Tool\StoreController");

Route::get('/front/login', 'Auth\LoginController@showLoginForm');

Route::get('static/{page?}', function($page = 'index') {
	return view('front/static/'.$page);
})->middleware('auth.front');

/*
Route::get('real/{page?}', function($page = 'index') {
	return view('front/real/'.$page);
})->middleware('auth.front');
Route::get('real/movie/{page?}', function($page = 'index') {
	return view('front/real/movie/'.$page);
})->middleware('auth.front');
*/

Route::get('/{dir?}/{subdir?}/{page?}', 'Front\MainController@index')->middleware('auth.front');
