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

//Institute Refistration
Route::get('admin/institute/registration','HomeController@getInstituteReg');
Route::post('admin/institute/registration','HomeController@postInstituteReg');

//Add Parent
Route::get('admin/add/parents','HomeController@getAddParents');
Route::post('admin/add/parents','HomeController@postAddParents');

//Add Teacher
Route::get('admin/add/teacher','HomeController@getAddTeacher');
Route::post('admin/add/teacher','HomeController@postAddTeacher');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//saif division  select such as dirstrict,thana

Route::get('api/dropdown', function(){
    $user = Input::get('option');
    $items = App\District::where('division_id', '=', $user)->lists('district','id');
    return Response::make($items);
});

Route::get('api/dropdown/thana', function(){
    $users = Input::get('option');    
    $items = App\Thana::where('district_name', '=', $users)->lists('thana_or_upazilla','id');
    return Response::make($items);
});
//class info add
Route::get('Addclass','HomeController@getaddclass');
Route::post('Addclass','HomeController@postaddclass');

 