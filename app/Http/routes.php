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
    $AtotalInstitute=App\Institute::where('status','=',1)->count();
      $AtotalStudents=App\Students::where('status','=',1)->count();
      $AtotalStudentsMale=App\Students::where('status','=',1)->where('gender','=','Male')->count();
      $AtotalStudentsFemale=App\Students::where('status','=',1)->where('gender','=','Female')->count();
  /*
        return view('welcome')->with('atotalInstitute',$AtotalInstitute)
        ->with('atotalStudents',$AtotalStudents)->with('atotalStudentsMale',$AtotalStudentsMale)->with('atotalStudentsFemale',$AtotalStudentsFemale);
   */
     $totalStudents=App\Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->count();
     $totalStudentsMale=App\Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
     $totalStudentsFemale=App\Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
     $totalTeachesrs=App\Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
   // return $AtotalInstitute;
    return view('welcome')->with('totalStudents',$totalStudents)->with('totalTeachesrs',$totalTeachesrs)
    ->with('totalStudentsMale',$totalStudentsMale)->with('totalStudentsFemale',$totalStudentsFemale)->with('atotalInstitute',$AtotalInstitute)
    ->with('atotalStudents',$AtotalStudents)->with('atotalStudentsMale',$AtotalStudentsMale)->with('atotalStudentsFemale',$AtotalStudentsFemale);
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

Route::get('api/dropdown/sub', function(){
    //for exam schedule
    $users = Input::get('option');
    //return $users;
    $items = App\Subject::where('institute_code','=',Auth::user()->institute_id)->where('class_id' ,'=', $users)->lists('subject_name','id');
    return Response::make($items);
});
Route::get('api/dropdown/section', function(){
    $user = Input::get('option');
    //return $user;
    $items = App\Section::where('institute_code','=',Auth::user()->institute_id)->where('class_id', '=', $user)->lists('section_name','section_id');
    return Response::make($items);
});
Route::get('api/dropdown/invoice', function(){
    $user = Input::get('option');
    //return $user;
    $items = App\Students::where('institute_code','=',Auth::user()->institute_id)->where('class', '=', $user)->lists('name','st_id');
    return Response::make($items);
});
Route::get('api/dropdown/invoice/section', function(){
    $user = Input::get('option');
    //return $user;
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
Route::get('/teachers/delete/{uid}','TeachersController@deleteTeachersInfo');

//Parents Edit Delete View
Route::get('/parents/details/{id}','ParentsController@getDetailsParents');
Route::get('/parents/edit/{id}','ParentsController@getEditParents');
Route::post('/parents/edit/{id}','ParentsController@updateParentsEdit');
Route::get('/parents/delete/{uid}','ParentsController@deleteParentsInfo');

//Search Student by Class


//mark management saif........
Route::get('mark/index','InstituteController@markIndex');
Route::get('mark/add','InstituteController@markadd');
Route::post('mark/add','InstituteController@postAddMark');
Route::post('mark/add/all','InstituteController@postAddMarkall');
/*
 Route::post('mark/add/all', function(){
  return 1;
if(Request::ajax()){
  $data = Input::all();
  return $data;
}
else {
  return 2;
}

});*/

Route::get('api/dropdown/subject', function(){
    $user = Input::get('option');
    //return $user;
    $items = App\Subject::where('institute_code','=',Auth::user()->institute_id)->where('class_id', '=', $user)->lists('subject_name','subject_code');
    return Response::make($items);
});
//Add edit delete Exam Info
Route::get('/admin/add/exam','InstituteController@getAddExam');
Route::post('/admin/add/exam','InstituteController@postAddExam');
Route::get('/exam/edit/{eid}','InstituteController@getEditExam');
Route::post('/exam/edit/{eid}','InstituteController@updateEditExam');
Route::get('/exam/delete/{eid}','InstituteController@deleteExamInfo');

//Add edit delete Exam Schedule
Route::get('/admin/add/exam/schedule','InstituteController@getExamSchedule');
Route::post('/admin/add/exam/schedule','InstituteController@postExamSchedule');
Route::get('/exam/schedule/edit/{id}','InstituteController@getEditExamSchedule');
Route::post('/exam/schedule/edit/{id}','InstituteController@updateEditExamSchedule');
Route::get('/exam/schedule/delete/{id}','InstituteController@deleteExamScheduleInfo');

//grade/index info manage


Route::get('grade/index','InstituteController@getgradeIndex');
Route::post('grade/index','InstituteController@postGradeIndex');
Route::get('grade/edit/{gid}','InstituteController@getGradeEdit');
Route::post('grade/edit/{gid}','InstituteController@postGradeEdit');
Route::get('grade/delete/{gid}','InstituteController@GradeDelete');

Route::get('/admin/add/routine','InstituteController@getAddRoutine');
Route::post('/admin/add/routine','InstituteController@postAddRoutine');
Route::post('admin/routine/search',['as'=>'searchroutine','uses'=>'InstituteController@postRoutineByClass']);
 //Routine Edit Delete
Route::get('/class/routine/edit/{id}','InstituteController@getEditClassRoutine');
Route::post('/class/routine/edit/{id}','InstituteController@UpdateClassRoutine');
Route::get('/class/routine/delete/{id}','InstituteController@DeleteClassRoutine');

//Accounts Section Start Here
/*Accounts Fee Type add edit delete update*/
Route::get('/admin/add/account/fee/type','AccountsController@getAccountType');
Route::post('/admin/add/account/fee/type','AccountsController@postAccountType');
Route::get('fee/type/edit/{id}','AccountsController@getEditFeeType');
Route::put('fee/type/edit/{id}','AccountsController@getUpdateFeeType');
Route::delete('fee/type/delete/{id}','AccountsController@getDeleteFeeType');
//user or sttaf crud operation
Route::get('user/index','InstituteController@getUserIndex');
Route::post('user/index','InstituteController@posuserinfo');
Route::get('user/details/{uid}','InstituteController@getUserInfo');
Route::get('user/details/edit/{uid}','InstituteController@getUserInfoedit');
Route::post('user/details/edit/{uid}','InstituteController@getUserInfoupdate');
Route::get('user/info/delete/{uid}','InstituteController@getuserinfodelete');

//Saif Student Mark & Resul Managements

//mark management saif........
Route::get('mark/index','StudentResultMarkController@markIndex');
Route::get('mark/add','StudentResultMarkController@markadd');
Route::post('mark/add','StudentResultMarkController@postAddMark');
Route::post('mark/add/all',['as'=>'postsubmark','uses'=>'StudentResultMarkController@postAddMarkall']);
Route::get('api/dropdown/subject', function(){
    $user = Input::get('option');
    //return $user;
    $items = App\Subject::where('institute_code','=',Auth::user()->institute_id)->where('class_id', '=', $user)->lists('subject_name','subject_code');
    return Response::make($items);
});

Route::get('mark/view/{roll}/{cid}','StudentResultMarkController@getMarkViews');

//Accounts Invoice Add Edit Delete view Update
Route::get('/admin/add/invoice','AccountsController@getInvoice');
Route::post('/admin/add/invoice','AccountsController@postInvoice');
Route::get('/admin/edit/invoice/{id}','AccountsController@editInvoice');
Route::post('/admin/edit/invoice/{id}','AccountsController@updateInvoice');
Route::get('/admin/invoice/delete/{id}','AccountsController@deleteInvoice');
Route::get('view/invoice/{id}','AccountsController@viewInvoice');
Route::get('print/invoice/{id}','AccountsController@printInvoice');
Route::get('admin/view/balance','AccountsController@viewBalance');
Route::get('admin/view/individual/balance/{name}','AccountsController@individualBalance');
Route::get('print/individual/report/{name}','AccountsController@individualReportPrint');


//Account Module For  Expense saif
Route::get('admin/add/Expense','AccountsController@getExpense');
Route::post('admin/add/Expense','AccountsController@postExpense');
Route::get('admin/edit/expenses/{id}','AccountsController@editExpense');
Route::post('admin/edit/expenses/{id}','AccountsController@updateExpense');
Route::get('admin/delete/expenses/{id}','AccountsController@deleteExpense');
Route::get('Institute/Setting','InstituteController@getInstitute');
Route::post('Institute/Setting','InstituteController@PostInstitute');
//Route::get('admin/add/Expense','AccountsController@getExpense');
//Route::get('admin/add/Expense','AccountsController@getExpense');
Route::get('admin/allreport','AccountsController@getReport');

//******   Individual Page For Institute    *****
Route::get('{url}','InstituteController@getIndividualInstituteUrl');
// ******************************************************//

//Library //
Route::get('public/library','LibraryController@getLibrary');

//Attendence //
Route::get('teacher/attendence','AttendenceController@getTeacherAttendence');
Route::get('give/attendence/teacher/{tid}','AttendenceController@postTeacherAttendence');
Route::get('give/attendence/teacher/end/{tid}','AttendenceController@postEndTeacherAttendence');

Route::get('attendence/result/teacher','AttendenceController@getReportTeacherAttendence');
Route::get('view/attendence/teacher/{tid}','AttendenceController@detailReportIndividualTeacher');
Route::get('give/absence/teacher/{iid}','AttendenceController@absenceReportTeacher');
//Attendance for Students
Route::get('students/attendence','AttendenceController@getStudentsAttendence');
Route::post('students/attendence','AttendenceController@postStudentsAttendence');
//Route::post('all/students/attendence','AttendenceController@postAllStudentsAttendence');
Route::get('absent/attendence/student/{uid}','AttendenceController@StudentsAttendenceforAbsent');
Route::get('students/attendence/Index','AttendenceController@getStudentsAttendenceIndex');
Route::post('students/attendence/Index','AttendenceController@postStudentsAttendenceIndex');
Route::get('/absent/attendence/student/details/{uid}','AttendenceController@postStudentsAttendenceDetails');

Route::get('/admin/acadimicClander','AttendenceController@getAcadimicClander');
Route::post('/admin/acadimicClander','AttendenceController@postAcadimicClander');

//Employee Time Schedule Route Get Post
Route::get('admin/set/in/out/time','AttendenceController@getInOutTime');
Route::post('admin/set/in/out/time','AttendenceController@postInOutTime');
Route::get('employee/schedule/delete/{id}','AttendenceController@DeleteInOutTime');

//Teacher JOb Distribution List Route
Route::get('teacher/job/allocation','AttendenceController@getTeacherJobAllocation');
//saif add for holyday
Route::post('admin/add/holyday',['as' => 'postholyday', 'uses' =>'AttendenceController@postholyday']);
Route::get('supadmin/add/govtholiday','AttendenceController@getGovetholiyday');
Route::post('supadmin/add/govtholiday','AttendenceController@postGovetholiyday');
