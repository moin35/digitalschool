<?php

namespace App\Http\Controllers;
use App\Mark;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
use Carbon\Carbon;

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
        $today = date("Y-m-d");   
      //$t= Attendence::where('institute_code','=',Auth::user()->institute_id)->MAX('id')->pluck('created_at');
        $teacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
        //return $t;
        return view('admin.attendence.teacherattendence',['teacher'=>$teacher,'p'=>$today]);
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
$today1 = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
$today2 = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month

$today5 = time('H:m:s');                            // 17:16:18
$today4 = date("Y-m-d g:i A");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
               // 2001-03-10 17:16:18 (the MySQL DATETIME format)
//return $today3;
        $time = date("H:i:s"); 
        $teacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->where('teacher_id','=',$tid)->first();
        $uid=$teacher->teacher_id;
        $iid=$teacher->institute_code;
        $type=$teacher->user_type;
        $up=new Attendence;
        $up->institute_code=$iid;
        $up->uid=$uid;
        $up->type=$type;
        $up->time=$time;
        $up->status=0;
        $up->save();
        Session::flash('data', 'Please Take Next Attendence');
        return redirect::to('teacher/attendence');
    }
    public function postEndTeacherAttendence($tid)
    {
        $teacher=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('uid','=',$tid)->update(['status'=>'1']);
        Session::flash('data', 'Please Take Next Attendence');
        return redirect::to('teacher/attendence');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReportTeacherAttendence()
    {
         $today = date("Y-m-d");
         $c=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('type','=','Teacher')
        ->where('created_at','LIKE',"%$today%")
        ->get();
return $c;
        $data=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('type','=','Teacher')
        ->where('created_at','LIKE',"%$today%")
        ->where('uid','LIKE','18967 1212')
        ->max('created_at');
     
               $data1=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('type','=','Teacher')
        ->where('created_at','LIKE',"%$today%")
        ->where('uid','LIKE','18967 1212')
        ->min('created_at');

           
          $d1=date("H:i:s", strtotime($data));
          $d2=date("H:i:s", strtotime($data1));
           $tdate=date("H:i:s", strtotime($data))-date("H:i:s", strtotime($data1));
          return  date("H:i:s", strtotime($tdate)).'start:'.$d1.'<br>'.'End:'.$d2;
//printf("Now: %s", Carbon::now());
//echo Carbon::minValue();
//$order = DB::table('tbl_attendence')->where('id', DB::raw("(select max('id') from tbl_attendence)"))->get();
    
       // return $order;
       //return $data->created_at->format('M jS Y g:ia');
       //$data = DB::table('tbl_teacher')
    //->join('tbl_attendence', 'tbl_attendence.uid', '=', 'tbl_teacher.teacher_id')
   // ->where('tbl_attendence.created_at','=','2016-02-25 13:26:11.000')
    //->get(array('tbl_attendence.id'));
    //return $data;
            return view('admin.attendence.teacherreport',['p'=>$today]);
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
