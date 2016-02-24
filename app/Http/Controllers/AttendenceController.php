<?php

namespace App\Http\Controllers;
use App\Mark;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassAdd;
=======
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Students;
use App\Institute;
use App\InstituteContacts;
use Illuminate\Support\Facades\Hash;
use App\InstituteInfo;
use App\Division;
use App\District;
use App\Thana;
use App\Subject;
use App\Teacher;
use App\ClassAdd;
use App\Parents;
use App\Section;
use App\Attendence;
use Illuminate\Support\Facades\DB;

>>>>>>> cee05a5d634d1c4e57ac0132ef4d0c39637f819f
class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private function getallclass(){
         $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
         return $class;
     }
    public function getTeacherAttendence()
    {
        $teacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
        //return $teacher;
        return view('admin.attendence.teacherattendence',['teacher'=>$teacher]);
    }


    public function getStudentsAttendence(){
       $this->getallclass();
      return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postTeacherAttendence($tid)
    {

// Assuming today is March 10th, 2001, 5:16:18 pm, and that we are in the
// Mountain Standard Time (MST) Time Zone

$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
$today = date("m.d.y");                         // 03.10.01
$today = date("j, n, Y");                       // 10, 3, 2001
$today = date("Ymd");                           // 20010310
$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
$today3 = date("H:i:s");                         // 17:16:18
$today = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
$today5 = time();                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
return strftime('%c');
        $teacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->where('teacher_id','=',$tid)->first();
        $uid=$teacher->teacher_id;
        $iid=$teacher->institute_code;
        $type=$teacher->user_type;
        $up=new Attendence;
        $up->institute_code=$iid;
        $up->uid=$uid;
        $up->type=$type;
        $up->status=1;
        //$up->save();
        Session::flash('data', 'Please Take Next Attendence');
        return redirect::to('teacher/attendence');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
