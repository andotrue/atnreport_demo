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

//////////////////ツール
Route::get('/tool/login', 'Auth\LoginController@showLoginForm');
Route::group(['middleware' => 'auth.tool'], function()
{
    //ツールTOP
    Route::get('/tool', 'HomeController@index');

    //CSVインポート
    Route::resource("tool/csvimport","Tool\CsvimportController");
    //ユーザグループ管理
    Route::resource("tool/grouptable","Tool\GrouptableController");
    

    //テストメールアドレス追加
    Route::post("tool/user/testmailaddress_add/","Tool\UserController@testmailaddress_add");
    //テストメールアドレス削除
    Route::get("tool/user/testmailaddress_del/{id}","Tool\UserController@testmailaddress_del");

    //ユーザ管理
    Route::resource("tool/user","Tool\UserController");
    
    //お知らせ管理　コピー機能
	Route::get("tool/information/copy/{id}","Tool\InformationController@copy");
    //お知らせ管理
	Route::resource("tool/information","Tool\InformationController");

    //施設管理
	Route::resource("tool/store","Tool\StoreController");

    //画像管理
	Route::resource("tool/image","Tool\ImageController");

	Route::any("tool/accesslog/forcontents/{no}","Tool\AccesslogController@forContents");
	Route::any("tool/accesslog/forstore/","Tool\AccesslogController@forStore");
	Route::resource("tool/accesslog","Tool\AccesslogController");
});


//////////////////フロント
Route::get('/front/login', 'Auth\LoginController@showLoginForm');

//フロントページ　静的ページ
// /static/hoge
Route::get('static/{page?}', function($page = 'index') {
	return view('front/static/'.$page);
})->middleware('auth.front');

//フロントページ　/以下
Route::get('/{dir?}/{subdir?}/{page?}', 'Front\MainController@index')->middleware('auth.front');
