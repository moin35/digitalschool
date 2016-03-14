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
use App\EmployeeSchedule;
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
        //$teacher=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('created_at','LIKE',"%$today%")->get();
   $teacher=DB::table('tbl_teacher')
           ->join('tbl_attendence','tbl_teacher.teacher_id','=','tbl_attendence.uid')
           ->select('tbl_teacher.*','tbl_attendence.*')
           ->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
           ->where('tbl_teacher.institute_code','=',Auth::user()->institute_id)
            ->where('tbl_attendence.type','=','Teacher')
           ->where('tbl_attendence.created_at','LIKE',"%$today%")
           ->get();
              return view('admin.attendence.teacherattendence',['teacher'=>$teacher,'p'=>$today,'iid'=>$iid]);
    }
    public function postTeacherAttendence($tid)
    {
//return 1;
// Assuming today is March 10th, 2001, 5:16:18 pm, and that we are in the
// Mountain Standard Time (MST) Time Zone
        //  $today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
        //  $today = date("m.d.y");                         // 03.10.01
        //  $today = date("j, n, Y");                       // 10, 3, 2001
        //  $today = date("Ymd");                           // 20010310
         // $today1 = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
        //  $today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
         // $today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
         // $today2 = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
          //$today5 = time('H:m:s');                            // 17:16:18
          //$today4 = date("Y-m-d g:i A");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
               // 2001-03-10 17:16:18 (the MySQL DATETIME format)
//return $today4;
        //$time = date("H:i:s");
        $today = date("Y-m-d");
   $teacher=Attendence::where('institute_code','=',Auth::user()->institute_id)
        ->where('uid','=',$tid)->where('created_at','LIKE',"%$today%")->update(['status'=>'0']);

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
    public function getReportTeacherAttendence()
    {
         $today = date("Y-m-d");
         $c=Teacher::where('institute_code','=',Auth::user()->institute_id)
        ->get();
//return $c;
            return view('admin.attendence.teacherreport',['p'=>$today,'at'=>$c]);
    }
    public function detailReportIndividualTeacher($tid)
    {
      $today=date("d");
      $m=date("Y-m");
      $y=date("Y");
      $at=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('created_at','LIKE',"%$m%")->where('status','=',1)->count();
      $atten_percent=(int)(($at/$today)*100);
      $ay=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('created_at','LIKE',"%$y%")->where('status','=',1)->count();

     if ($y%4==0) {
      $x=366;
       $year_percent=(int)(($ay/$x)*100);
     }
     else{
       $yx=365;
       $year_percent=(int)(($ay/$yx)*100);
     }
$month = date('m');
$year = date("Y");
//return $year;
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);
for($i=$start_time; $i<$end_time; $i+=86400)
{
   $list[] = date('Y-m-d', $i);
   $list1[] = date('d D', $i);
}
//foreach ($list1 as $key => $value) {
//$value;
 //$t=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('created_at','LIKE',"%$value%")->first();
//echo $t;
//}
//var_dump($list);
//return $list1;
    //return $t;
      $tpinfo=Teacher::where('institute_code','=',Auth::user()->institute_id)->where('teacher_id','=',$tid)->first();
       $today = date("Y-m-d");
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
$diff_seconds  = strtotime('10:00:00.000') - strtotime($data1);
//return $diff_seconds;
$stat = floor($diff_seconds/3600).'H:'.floor(($diff_seconds%3600)/60).'M';
//return $stat;
        return view('admin.attendence.teacherattendencedetail',['stat'=>$stat,
          'teacher'=>$tpinfo,'percent'=>$atten_percent,'year'=>$year_percent,'day'=>$list,'pre'=>$list1]);
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
        //$up->created_at=$time;
        $up->status=2;//status 2 meaning absence this teacher
        $up->save();
        }
        Session::flash('data', 'Please Take Next Attendence');
        return redirect::to('teacher/attendence');
    }
    public function getInOutTime()
    {
        $view=EmployeeSchedule::where('institute_code','=',Auth::user()->institute_id)->get();
        return view('admin.inout.inout',['v'=>$view]);
    }
    public function postInOutTime()
    {
        $stime=Input::get('stime');
        $sgtime=Input::get('sgtime');
        $etime=Input::get('etime');
        $egtime=Input::get('egtime');
        $schedule=Input::get('schedule');
        $oltime=Input::get('oltime');
        $iid=User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        //return $iid;
        $up= new EmployeeSchedule;
        $up->start_time= $stime;
        $up->strat_time_grace= $sgtime;
        $up->end_time= $etime;
        $up->end_time_grace= $egtime;
        $up->shift= $schedule;
        $up->extra_time= $oltime;
        $up->institute_code= $iid;
        $up->save();
//return $stime.'/'.$sgtime.'/'.$etime.'/'.$egtime.'/'.$schedule.'/'.$oltime;
        Session::flash('data', 'Schedule Added Successfully !');
        return Redirect::to('admin/set/in/out/time');
    }
    public function DeleteInOutTime($id)
    {
         $delete = EmployeeSchedule::where('id', '=', $id)->delete();
        Session::flash('data', 'Data successfully Delete !');
        return Redirect::to('admin/set/in/out/time');
    }
    //saif studentsAttendence add
        public function getStudentsAttendence(){
            //$this->postStudentsAttendence();
          //  $data=Input::all();
             $dateTime=Input::get('date');
             $clasId=Input::get('class');
             $sectionName=Input::get('section');
             $today = date("Y-m-d");
          // $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clasId)->where('section','=',$sectionName)->get();
            $GetStudents=DB::table('tbl_studets')
           ->join('tbl_attendence','tbl_studets.st_id','=','tbl_attendence.uid')
           ->select('tbl_studets.*','tbl_attendence.*')
           ->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
           ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
            ->where('tbl_attendence.type','=','Student')
           ->where('tbl_attendence.created_at','LIKE',"%$today%")
           ->get();
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
      $today = date("Y-m-d");
      $data1=Attendence::where('institute_code','=',Auth::user()->institute_id)
      ->where('type','=','Student')
      ->where('created_at','LIKE',"%$today%")
      ->get();
      if ($data1->count()==0) {
        # code...
        $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clasId)->where('section','=',$sectionName)->get();
        foreach ($GetStudents as $key => $value) {
        //return $data1->count();
           $stdAtn=new Attendence;
           $stdAtn->institute_code=Auth::user()->institute_id;
           $stdAtn->uid=$value->st_id;
           $stdAtn->type="Student";
           $stdAtn->status=0;
           $stdAtn->save();
           //return redirect()->back();
        }
        return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents)
        ->with('sectionName',$sectionName)->with('classId',$clasId)->with('dateTime',$dateTime);
        }
      else {
        # code...
        $GetStudents=DB::table('tbl_studets')
       ->join('tbl_attendence','tbl_studets.st_id','=','tbl_attendence.uid')
       ->select('tbl_studets.*','tbl_attendence.*')
       ->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
       ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
        ->where('tbl_attendence.type','=','Student')
       ->where('tbl_attendence.created_at','LIKE',"%$today%")
       ->get();
        return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents)
        ->with('sectionName',$sectionName)->with('classId',$clasId)->with('dateTime',$dateTime);
      }
       //return $GetStudents;
    }
    public function StudentsAttendenceforAbsent($uid)
    {
      # code...
      //return $uid;
        $today = date("Y-m-d");
      $data1=Attendence::where('institute_code','=',Auth::user()->institute_id)
      ->where('type','=','Student')
      ->where('uid','=',$uid)
      ->where('created_at','LIKE',"%$today%")
      ->update(['status'=>1]);
      return redirect()->back();
    }
    public function getStudentsAttendenceIndex(){
      //$today = date("Y-m-d");
      $this->getallclass();
      $clseId=Input::get('class');
      $sectionId=Input::get('section');
    /*  $GetStudents=DB::table('tbl_studets')
     ->join('tbl_attendence','tbl_studets.st_id','=','tbl_attendence.uid')
     ->select('tbl_studets.*','tbl_attendence.*')
     ->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
     ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
      ->where('tbl_attendence.type','=','Student')
     //->where('tbl_attendence.created_at','LIKE',"%$today%")
     ->get();*/
     $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clseId)->where('section','=',$sectionId)->get();
       return view('admin.attendence.studentsAttendenceIndex')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents);
    }
    public function postStudentsAttendenceIndex(){
      $clseId=Input::get('class');
      $sectionId=Input::get('section');
      //return $clseId;
    //  $today = date("Y-m-d");
    /*    $this->getallclass();
      $GetStudents=DB::table('tbl_studets')
     ->join('tbl_attendence','tbl_studets.st_id','=','tbl_attendence.uid')
     ->select('tbl_studets.*','tbl_attendence.*')
     ->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
     ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
      ->where('tbl_attendence.type','=','Student')
      ->where('tbl_studets.class','=',$clseId)
      ->where('tbl_studets.section','=',$sectionId)
  //   ->where('tbl_attendence.created_at','LIKE',"%$today%")
     ->get();*/
     $GetStudents=students::where('institute_code','=',Auth::user()->institute_id)->where('class','=',$clseId)->where('section','=',$sectionId)->get();
       return view('admin.attendence.studentsAttendenceIndex')->with('GetStudents',$GetStudents)->with('allclass',$this->getallclass());
    }public function postStudentsAttendenceDetails($uid){

$maxDays=date('t');//how may day current month
$currentDayOfMonth=date('j');//today numaric


$today = date("d");
$Cmonth = date("Y-m");
$y=date("Y");
// return $y;
$GetStudents=DB::table('tbl_studets')
->join('tbl_attendence','tbl_studets.st_id','=','tbl_attendence.uid')
->select('tbl_studets.*','tbl_attendence.*')
->where('tbl_attendence.institute_code','=',Auth::user()->institute_id)
->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
->where('tbl_attendence.type','=','Student')
->where('tbl_studets.st_id','=',$uid)
->first();


$stdPrestAve=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$uid)->where('status','=',0)->where('created_at','LIKE',"%$Cmonth%")->count();
$presentPersent= (int)(($stdPrestAve/$today)*100);

$stdClass=ClassAdd::where('class_id','=',$GetStudents->class)->pluck('class_name');
$month = date('m');
$year = date("Y");

$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);

$end_time = strtotime("+1 month", $start_time);

for($i=$start_time; $i<$end_time; $i+=86400)
{
$list[] = date('d D', $i);
}
for($i=$start_time; $i<$end_time; $i+=86400)
{
$listdate[] = date('Y-m-d', $i);
}
//return $rand = substr(uniqid('', true), -4);//uniq random id limit
return view('admin.attendence.studentsAttendanceViewDetails')
->with('stdInfo',$GetStudents)->with('stdClass',$stdClass)
->with('persent',$presentPersent)->with('day',$list)
->with('listdate',$listdate);

}
public function getTeacherJobAllocation(){

        
            $ts = Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
      


  return view('admin.allocation.teacherallocation',['view'=>$ts]);
}

    public function postTeacherJobAllocation($tid)
    {
      //return $tid;
      $scheduleget=EmployeeSchedule::where('institute_code','=',Auth::user()->institute_id)->get();
      $schedule=EmployeeSchedule::where('institute_code','=',Auth::user()->institute_id)->count();
      $tedit=User::where('institute_id','=',Auth::user()->institute_id)->where('uid','=',$tid)->first();
     return view('admin.allocation.permission',['editExpense'=>$tedit,'scount'=>$schedule,'sget'=>$scheduleget]);
       
    }
public function UpdateTeacherAllocation($tid){

$attdence=Input::get('attendence');
$addmission=Input::get('addmission');
$teacheradd=Input::get('teacheradd');
$subjectadd=Input::get('subjectadd');
$examschedule=Input::get('examschedule');
$classroutine=Input::get('classroutine');
$notice=Input::get('notice');
$sms=Input::get('sms');
$shift=Input::get('shift');
$a0=User::where('institute_id','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('attdence','=',0)->pluck('attdence');
$a1=User::where('institute_id','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('attdence','=',1)->pluck('attdence');
//return $attdence;
//return ;
if ($attdence==$a1) {
  $up=User::where('institute_id','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('attdence','=',$a1)
            ->update(['attdence'=>0]);
  //return $attdence;

}
elseif ($attdence==NULL) {
  
  $up=User::where('institute_id','=',Auth::user()->institute_id)->where('uid','=',$tid)->where('attdence','=',1)
            ->update(['attdence'=>1]);
return 1;
}
else{
  return 'OK';
  }

  return Redirect::to('allocation/permission/'.$tid);
}




}
