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
      $iid= Teacher::where('institute_code','=',Auth::user()->institute_id)->pluck('institute_code');
        
       $teacher = DB::table('tbl_attendence')
            ->join('tbl_teacher', 'tbl_attendence.institute_code', '=', 'tbl_teacher.institute_code')
            ->select('tbl_teacher.teacher_id','tbl_teacher.phone','tbl_teacher.name','tbl_teacher.designation','tbl_teacher.email','tbl_attendence.status')
            ->where('tbl_attendence.created_at','LIKE',"%$today%")

          //  ->select('tbl_teacher.teacher_id','tbl_teacher.phone','tbl_teacher.name','tbl_teacher.designation','tbl_teacher.email', 'tbl_attendence.status')
            ->get();
          return $teacher;
        return view('admin.attendence.teacherattendence',['teacher'=>$teacher,'p'=>$today,'iid'=>$iid]);
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
//return $today4;
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
        $today= date("Y-m-d");  
        $teacher=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('uid','=',$tid)->where('created_at','LIKE',"%$today%")->update(['status'=>'1']);
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
         $c=Teacher::where('institute_code','=',Auth::user()->institute_id)
     
        ->get();
//return $c;

            return view('admin.attendence.teacherreport',['p'=>$today,'at'=>$c]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailReportIndividualTeacher($tid)
    {
                $data1=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('type','=','Teacher')
        ->where('created_at','LIKE',"%$today%")
        ->where('uid','LIKE',$tid)
        ->pluck('created_at');
             $data2=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('type','=','Teacher')
        ->where('created_at','LIKE',"%$today%")
        ->where('uid','LIKE',$tid)
        ->pluck('updated_at');

$diff_seconds  = strtotime($data2) - strtotime($data1);
$stat = floor($diff_seconds/3600).'H:'.floor(($diff_seconds%3600)/60).'M';

        return view('',['stat'=>$stat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function absenceReportTeacher($iid)
    {
      //return 1;
      //$time = date("H:i:s");
$v=Teacher::where('institute_code','=',$iid)->get();
        foreach ($v as $key => $value) {
//return $value->teacher_id;
           $up=new Attendence;
        $up->institute_code=$iid;
        $up->uid=$value->teacher_id;
        $up->type='Teacher';
        //$up->time=$time;
        $up->status=2;//status 2 meaning absence this teacher
        $up->save();
        }
      
        Session::flash('data', 'Please Take Next Attendence');
        return redirect::to('teacher/attendence');
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

    //saif studentsAttendence add
        public function getStudentsAttendence(){
            //$this->postStudentsAttendence();
          //  $data=Input::all();
             $dateTime=Input::get('date');
             $clasId=Input::get('class');
             $sectionName=Input::get('section');
           $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clasId)->where('section','=',$sectionName)->get();
           //$GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->get();
           //   return $GetStudents->count();
           $this->getallclass();
          return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents)
          ->with('sectionName',$sectionName)->with('classId',$clasId)->with('dateTime',$dateTime);
        }


      public function postStudentsAttendence()
    {
     //  Request $request

      // return $GetStudents;
      $dateTime=Input::get('date');
      $clasId=Input::get('class');
      $sectionName=Input::get('section');

      $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clasId)->where('section','=',$sectionName)->get();

      foreach ($GetStudents as $key => $value) {

      //  return $value->st_id;

      $stdAtn=new Attendence;
      $stdAtn->institute_code=Auth::user()->institute_id;
      $stdAtn->uid=$value->st_id;
      $stdAtn->type="Student";
      $stdAtn->status=0;
      $stdAtn->save();

      }

     return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents)
     ->with('sectionName',$sectionName)->with('classId',$clasId)->with('dateTime',$dateTime);

       //return $GetStudents;

    }
    public function postAllStudentsAttendence(Request $request){
      if($request->ajax()){
        $data=Input::all();
        return $data;

      }
    }

}
