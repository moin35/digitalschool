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
//auth route moin
Route::get('home',['middleware' => 'auth', 'uses' => 'HomeController@home']);
Route::get('/lang/{lang}',['middleware' => 'auth', 'uses' => 'LangController@home']);

Route::get('reg', function(){
    return view('institute.reg_institute');
});
//Add Student Route moin
Route::get('add/student','HomeController@getAddStudent');
Route::post('add/student','HomeController@postAddStudent');

//Institute Registration
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
//Add Subject
Route::get('admin/add/subject','HomeController@getAddSubject');
Route::post('admin/add/subject','HomeController@postAddSubject');

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
Route::get('api/dropdown/section', function(){
    $user = Input::get('option');
    $items = App\Section::where('institute_code','=',Auth::user()->institute_id)->where('class_id', '=', $user)->lists('section_name','section_id');
    return Response::make($items);
});
//class info add
Route::get('Addclass','InstituteController@getaddclass');
Route::post('Addclass','InstituteController@postaddclass');
Route::get('class/edit/{clid}','InstituteController@geteditclass');
Route::post('class/edit/{clid}','InstituteController@postupdateclass');
Route::get('class/delete/{clid}','InstituteController@deleteclass');

//Class section Add
Route::get('sectionAdd','InstituteController@getsection');
Route::post('sectionAdd','InstituteController@postsection');
Route::get('section/edit/{secid}','InstituteController@geteditsection');
Route::post('section/edit/{secid}','InstituteController@postupdatesection');
Route::get('section/delete/{secid}','InstituteController@deletesection');
//Institute Refistration
Route::get('institute/details/{icode}','HomeController@viewinstuted');
Route::get('institute/edit/{icode}','HomeController@editinstutedinfo');
Route::post('institute/edit/{icode}','HomeController@editinstutedinfoupdate');
Route::get('institute/delete/{icode}','HomeController@deleteinstutedinfo');

//Route edit delete subject
Route::get('admin/edit/subject/{scode}','StudentsController@getEditSubject');
Route::post('admin/edit/subject/{scode}','StudentsController@postUpdateSubject');

//filter student by class
Route::post('admin/student/search',['as'=>'searchstudent','uses'=>'StudentController@postStudentSearch']);

//Student edit delete view
Route::get('/student/details/{id}','StudentsController@getDetailStudents');
Route::get('/student/edit/{id}','StudentsController@getStudentsEdit');
Route::post('/student/edit/{id}','StudentsController@UpdateStudentsEdit');
Route::get('/student/delete/{uid}','StudentsController@deleteStudentInfo');

//Teacher Edit Delete View
Route::get('/teachers/details/{id}','TeachersController@getDetailsTeacher');
Route::get('/teachers/edit/{id}','TeachersController@getTeacherEdit');
Route::post('/teachers/edit/{id}','TeachersController@updateTeacherEdit');
Route::get('/teacher/delete/{uid}','StudentsController@deleteTeachersInfo');
 
//Parents Edit Delete View
Route::get('/parents/details/{id}','ParentsController@getDetailsParents');
Route::get('/parents/edit/{id}','ParentsController@getEditParents');
Route::post('/parents/edit/{id}','ParentsController@updateParentsEdit');
Route::get('/parents/delete/{uid}','ParentsController@deleteParentsInfo');

//Add edit delete Exam Info
Route::get('/admin/add/exam','InstituteController@getAddExam');
Route::post('/admin/add/exam','InstituteController@postAddExam');
Route::get('/exam/edit/{eid}','InstituteController@getEditExam');
Route::post('/exam/edit/{eid}','InstituteController@updateEditExam');
Route::get('/exam/delete/{eid}','InstituteController@deleteExamInfo');

//Add edit delete Exam Schedule
Route::get('/admin/add/exam/schedule','InstituteController@getExamSchedule');