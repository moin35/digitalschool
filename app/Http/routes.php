<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('welcome');
    }
    else{
    return view('auth.login');
    }
});

Route::get('home',['middleware' => 'auth', 'uses' => 'HomeController@home']);
Route::get('/lang/{lang}',['middleware' => 'auth', 'uses' => 'LangController@home']);

Route::get('reg', function(){
    return view('institute.reg_institute');
});
//Add Student Route
Route::get('add/student','HomeController@getAddStudent');
Route::post('add/student','HomeController@postAddStudent');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');