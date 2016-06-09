<?php
namespace App\Http\Controllers;
use App\Mark;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\DB;
use App\Attendence;
use App\EmployeeSchedule;
use App\Holyday;
use App\InstiHolyday;
use App\AcademicCalender;
use Carbon\Carbon;
use App\Room;
class HomeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//
    }
    public function home() {
        if (Auth::check()) {
          //Super Admin Dashboard //
            if (priv() == 1) {
//return date("Y-m-d", strtotime("-4 months"));
/* Current Month Total Day Count Start */
$date = new \DateTime("-6");
$date->modify("-" . ($date->format('j')-1) . " days");


$month = date('m');
$year = date("Y");
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);
for($i=$start_time; $i<$end_time; $i+=86400)
{
   $list[] = date('Y-m-d', $i);
   $list1[] = date('d D', $i);
}
$daycount=count($list);
//return $mo;
//return count($list);
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
              //return $t.'--'.$e;
$begin = new \DateTime($t);
$end = new \DateTime($e);

$interval = new \DateInterval('P1D');
$daterange = new \DatePeriod($begin, $interval, $end);
$weekends = [];

foreach($daterange as $date) {
    if (in_array($date->format('N'), [5])) {
        $weekends[$date->format('W')][] = $date->format('Y-m-d');
    }
}
$week= count($weekends);
//return $week;
//echo 'Number of weeks: ' . count($weekends);
//echo 'Number of weekend days: ' . (count($weekends, COUNT_RECURSIVE) - count($weekends));
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;

$m=date("Y-m");
          $teacheratten1=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',1)->count();
                  $teacheratten2=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',0)->count();
                  $total=$teacheratten1+ $teacheratten2;
  $tcurrent=(int) (($total/$allteacherworkday)*100);
/************ Current Month Teacher Attdence Percentage End ****************/
/************ Current Month Student Attdence Percentage Start ****************/
$student= Students::all()->count();
$studentclassday=$workday*$student;
//return $studentclassday;
$m=date("Y-m");
          $studentm=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Student')
                  ->where('status','=',0)->count();
  $sttotal=(int) (($studentm/$studentclassday)*100);
/************ Current Month Student Attdence Percentage End ****************/

/*** six month day count Start ***/
$d1 = date("Y-m-d");
$d2= date("Y-m-d", strtotime("-6 months"));
//return $d2.$d1;
$date1 = strtotime($d2);
$date2 = strtotime($d1);
//return $date1.'=='.$date2;
$months = 0;
while (($date1 = strtotime('+1 DAY', $date1)) <= $date2)
    $months++;
//return  $months;
/*** Week Count For six month Start***/
              $t=$d2;
              $e=$d1;
              //return $t.'--'.$e;
$beginsix = new \DateTime($t);
$endsix = new \DateTime($e);
//return $begin.'--'.$end;
$intervalsix = new \DateInterval('P1D');
$daterangesix = new \DatePeriod($beginsix, $intervalsix, $endsix);
$weekendsix = [];

foreach($daterangesix as $date) {
    if (in_array($date->format('N'), [5])) {
        $weekendsix[$date->format('W')][] = $date->format('Y-m-d');
    }
}
$weeksix= count($weekendsix);
/* Teacher Six month calculation start */
$totaldaycountsix=$months-$weeksix;
$t1=Attendence::whereBetween('created_at', [$d2,$d1])
->where('type','=','Teacher')
->where('status','=',1)->count();
$t2=Attendence::whereBetween('created_at', [$d2,$d1])
->where('type','=','Teacher')
->where('status','=',0)->count();
$ct= $t1+$t2;
$sixmonthtattenpercent=(int)(($ct/$totaldaycountsix)*100);
/* Teacher Six month calculation End */
/* Student Six month calculation start */
$s1=Attendence::whereBetween('created_at', [$d2,$d1])
->where('type','=','Student')
->where('status','=',0)->count();

$studentpercentsixmonth=(int)(($s1/$totaldaycountsix)*100);

/* Student Six month calculation End */
//echo 'Number of weeks: ' . count($weekends);
//echo 'Number of weekend days: ' . (count($weekends, COUNT_RECURSIVE) - count($weekends));
/*** Week Count For Six month End ***/
/*** six month day count End ***/
/*** one year day count Start ***/
$dy1 = date("Y-m-d");
$dy2= date("Y-m-d", strtotime("-12 months"));
//return $d2.$d1;
$datey1 = strtotime($dy2);
$datey2 = strtotime($dy1);
//return $date1.'=='.$date2;
$monthsy = 0;
while (($datey1 = strtotime('+1 DAY', $datey1)) <= $datey2)
    $monthsy++;
//return  $months;
/*** Week Count For six month Start***/
              $ty=$dy2;
              $ey=$dy1;
              //return $t.'--'.$e;
$beginy = new \DateTime($ty);
$endy = new \DateTime($ey);
//return $begin.'--'.$end;
$intervaly = new \DateInterval('P1D');
$daterangey = new \DatePeriod($beginy, $intervaly, $endy);
$weekendy = [];

foreach($daterangey as $date) {
    if (in_array($date->format('N'), [5])) {
        $weekendy[$date->format('W')][] = $date->format('Y-m-d');
    }
}
$weekyear= count($weekendy);
//return $weekyear;
$totaldaycountyear=$monthsy-$weekyear;
/* Teacher One year Start*/
$ty1=Attendence::whereBetween('created_at', [$dy2,$dy1])
->where('type','=','Teacher')
->where('status','=',1)->count();
$ty2=Attendence::whereBetween('created_at', [$dy2,$dy1])
->where('type','=','Teacher')
->where('status','=',0)->count();
$cty= $ty1+$ty2;
//return $cty;
$yeartattenpercent=(int)(($cty/$totaldaycountyear)*100);
/* Teacher One year End*/
/* Student One year Start*/
$sy2=Attendence::whereBetween('created_at', [$dy2,$dy1])
->where('type','=','Student')
->where('status','=',0)->count();

//return $cty;
$styearcount=(int)(($sy2/$totaldaycountyear)*100);

/* Student One year End*/
//return $yeartattenpercent;
//echo 'Number of weeks: ' . count($weekends);
//echo 'Number of weekend days: ' . (count($weekends, COUNT_RECURSIVE) - count($weekends));
/*** Week Count For Six month End ***/
/*** six month day count End ***/
/***************************************************** Teacher Percent End ********/
//Super Admin
                $AtotalInstitute=Institute::where('status','=',1)->count();
                $AtotalStudents=Students::where('status','=',1)->count();
                $AtotalStudentsMale=Students::where('status','=',1)->where('gender','=','Male')->count();
                $AtotalStudentsFemale=Students::where('status','=',1)->where('gender','=','Female')->count();

                $SAtotalTeachers=Teacher::all()->count();
                $SAtotalTeachersMale=Teacher::where('gender','=','Male')->count();
                $SAtotalTeachersFeMale=Teacher::where('gender','=','Female')->count();
                $OthersTeacher=Teacher::where('gender','=','Other')->count();
                  //today report in %
                  $today=date('Y-m-d');
                  $y=date("Y");
                  //$totalTeachesrs=Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
                  $teacherAttendence=Attendence::
                  where('type','=','Teacher')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
                  $teacherAttendence1=Attendence::
                  where('type','=','Teacher')->where('status','=',1)->where('created_at','LIKE',"%$today%")->count();

                  $total= $teacherAttendence+$teacherAttendence1;
                  //return $total;
                  $today_atten=(int)(($total/$SAtotalTeachers)*100);
                  //return $today_atten;
                  //end today report
                  //This Month Report in %
                    $m=date("Y-m");
                    $d=date('t');
                    $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
                    $p=$d-$at;
                  $a12=Attendence::
                  where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',1)->count();

                  $a02=Attendence::
                  where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',0)->count();
                  $ay2=$a12+$a02;
                  //return $a12.$a02;
                  $t=$SAtotalTeachers*$p;
                  $ms=(int)(($ay2/$t)*100);
                  //return $ms;
                  //This Month Rreport End
              return view('welcome')->with('atotalInstitute',$AtotalInstitute)
              ->with('atotalStudents',$AtotalStudents)
              ->with('atotalStudentsMale',$AtotalStudentsMale)
              ->with('atotalStudentsFemale',$AtotalStudentsFemale)
              ->with('satotalteacher',$SAtotalTeachers)
              ->with('satotalmaleteacher',$SAtotalTeachersMale)
              ->with('satotalfemaleteacher',$SAtotalTeachersFeMale)
              ->with('others',$OthersTeacher)
              ->with('today',$today_atten)
              ->with('cmonth',$ms)
              ->with('tattencmonth',$tcurrent)
              ->with('sixmonth',$sixmonthtattenpercent)
              ->with('oneyear',$yeartattenpercent)
              ->with('totalstudentmonth',$sttotal)
              ->with('totalpercentstudentsix',$studentpercentsixmonth)
              ->with('studentoneyear',$styearcount);



            }
            elseif(priv()==2){
              /****Student****/
                $today=date('Y-m-d');
                $y=date("Y");
                //return $today;
                $totalStudents=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->count();
                $totalStudentsMale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
                $totalStudentsFemale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
                $totalTeachesrs=Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
                $teacherAttendence=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
                   $teacherAttendence1=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',1)->where('created_at','LIKE',"%$today%")->count();

              $total= $teacherAttendence+$teacherAttendence1;
              //return $total;
                  $today_atten=(int)(($total/$totalTeachesrs)*100);
                  //return $today_atten;
         $a1=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();
         $a0=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay=$a1+$a0;
//return $ay;
     if ($y%4==0) {
      $x=366;
       $year_percent=(int)(($ay/$x)*100);
     }
     else{
       $yx=365;
       $year_percent=(int)(($ay/$yx)*100);
     }
       $totalTeacherMale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
      $totalTeacherFemale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
   $m=date("Y-m");
   $d=date('t');
   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $p=$d-$at;
   //return $p;
 $a12=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();

         $a02=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay2=$a12+$a02;
             //return $a12.$a02;
         $t=$totalTeachesrs*$p;
   $ms=(int)(($ay2/$t)*100);
   //return $ms;

   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $InstiHolyday=InstiHolyday::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
  // $InstiHolyday=AcademicCalender::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
   //return $InstiHolyday;
   $p=$d-($at+$InstiHolyday);
   $ms=(int)(($p/$d)*100);
   //students attendence report saif...
   //today attendence calculation
   $totalStudents=Students::where('institute_code', '=', Auth::user()->institute_id)->count();
   $totalstudentsAtten=Attendence::where('institute_code', '=', Auth::user()->institute_id)
   ->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
    $studentTodayReport=(int)(($totalstudentsAtten/$totalStudents)*100);
    //monthly calculation
    $stdPrestAve=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$m%")->count();
    //$presentPersent= (int)(($stdPrestAve/$p)*100);
    $mtotal=($totalStudents*$p);
     $monthpresentPersent= (int)(($stdPrestAve/$mtotal)*100);
     ///yearly calculation


   return view('welcome')->with('totalStudents',$totalStudents)->with('totalTeachesrs',$totalTeachesrs)
                    ->with('totalStudentsMale',$totalStudentsMale)
                    ->with('totalStudentsFemale',$totalStudentsFemale)
                    ->with('today',$today_atten)
                    ->with('year',$year_percent)
                    ->with('m',$totalTeacherMale)
                    ->with('f',$totalTeacherFemale)
                    ->with('mon',$ms)
                    ->with('studentTodayReport',$studentTodayReport)
                    ->with('monthpresentPersent',$monthpresentPersent);
            }
            elseif(priv()==3){
              /****School Admin****/
                $totalStudents=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->count();
                $totalStudentsMale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
                $totalStudentsFemale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
                $totalTeachesrs=Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
      $totalTeacherMale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
      $totalTeacherFemale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
   /* Current Month Total Day Count Start */
$date = new \DateTime("-6");
$date->modify("-" . ($date->format('j')-1) . " days");


$month = date('m');
$year = date("Y");
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);
for($i=$start_time; $i<$end_time; $i+=86400)
{
   $list[] = date('Y-m-d', $i);
   $list1[] = date('d D', $i);
}
$daycount=count($list);
//return $mo;
//return count($list);
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
              //return $t.'--'.$e;
$begin = new \DateTime($t);
$end = new \DateTime($e);

$interval = new \DateInterval('P1D');
$daterange = new \DatePeriod($begin, $interval, $end);
$weekends = [];

foreach($daterange as $date) {
    if (in_array($date->format('N'), [5])) {
        $weekends[$date->format('W')][] = $date->format('Y-m-d');
    }
}
$week= count($weekends);
//return $week;
//echo 'Number of weeks: ' . count($weekends);
//echo 'Number of weekend days: ' . (count($weekends, COUNT_RECURSIVE) - count($weekends));
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
          $teacheratten1=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('institute_code', '=', Auth::user()->institute_id)
                  ->where('type','=','Teacher')
                  ->where('status','=',1)->count();
          $teacheratten2=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('institute_code', '=', Auth::user()->institute_id)
                  ->where('type','=','Teacher')
                  ->where('status','=',0)->count();
          $total=$teacheratten1+ $teacheratten2;
     // return $allteacherworkday;

          if ($allteacherworkday==0) {
          // return 1;
            $tcurrent=(int) (($total/1)*100);
           // return $tcurrent;
          }
          elseif ($allteacherworkday!=0) {
           $tcurrent=(int) (($total/$allteacherworkday)*100);
          }
          //return 2;
  //$tcurrent=(int) (($total/$allteacherworkday)*100);
 //return $tcurrent;

/************ Current Month Teacher Attdence Percentage End ****************/
/************ Current Month Student Attdence Percentage Start ****************/
$student= Students::where('institute_code', '=', Auth::user()->institute_id)->count();
$studentclassday=$workday*$student;
//return $studentclassday;
$m=date("Y-m");
          $studentm=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Student')
                  ->where('status','=',0)->count();
                  if ($studentclassday==0) {
                     $sttotal=(int) (($studentm/1)*100);
                  }
                  elseif ($studentclassday!=0) {
                    $sttotal=(int) (($studentm/$studentclassday)*100);
                  }
  //$sttotal=(int) (($studentm/$studentclassday)*100);
/************ Current Month Student Attdence Percentage End ****************/

   return view('welcome')->with('totalStudents',$totalStudents)
                    ->with('totalTeachesrs',$totalTeachesrs)
                    ->with('totalStudentsMale',$totalStudentsMale)
                    ->with('totalStudentsFemale',$totalStudentsFemale)                  
                    ->with('m',$totalTeacherMale)
                    ->with('f',$totalTeacherFemale)
                    ->with('teacherthismonth',$tcurrent)
                    ->with('studentrthismonth',$sttotal);
}
            elseif(priv()==4){
              /****Teacher****/
                $today=date('Y-m-d');
                $y=date("Y");
                //return $today;
                $totalStudents=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->count();
                $totalStudentsMale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
                $totalStudentsFemale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
                $totalTeachesrs=Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
                $teacherAttendence=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
                   $teacherAttendence1=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',1)->where('created_at','LIKE',"%$today%")->count();

              $total= $teacherAttendence+$teacherAttendence1;
              //return $total;
                  $today_atten=(int)(($total/$totalTeachesrs)*100);
                  //return $today_atten;
         $a1=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();
         $a0=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay=$a1+$a0;
//return $ay;
     if ($y%4==0) {
      $x=366;
       $year_percent=(int)(($ay/$x)*100);
     }
     else{
       $yx=365;
       $year_percent=(int)(($ay/$yx)*100);
     }
                //return $atten_percent;
                // return $AtotalInstitute;
      $totalTeacherMale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
      $totalTeacherFemale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
   $m=date("Y-m");
    ///$h=Holyday::where('holiday_date','LIKE',"%2016-03%")->get();
   //$h=Holyday::where('holiday_date','LIKE',"%$m%")->get();
   $d=date('t');

   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $p=$d-$at;
   //return $p;
 $a12=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();

         $a02=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay2=$a12+$a02;
             //return $a12.$a02;
         $t=$totalTeachesrs*$p;
   $ms=(int)(($ay2/$t)*100);
   //return $ms;

   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $InstiHolyday=InstiHolyday::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
  // $InstiHolyday=AcademicCalender::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
   //return $InstiHolyday;
   $p=$d-($at+$InstiHolyday);
   $ms=(int)(($p/$d)*100);
   //students attendence report saif...
   //today attendence calculation
   $totalStudents=Students::where('institute_code', '=', Auth::user()->institute_id)->count();
   $totalstudentsAtten=Attendence::where('institute_code', '=', Auth::user()->institute_id)
   ->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
    $studentTodayReport=(int)(($totalstudentsAtten/$totalStudents)*100);
    //monthly calculation
    $stdPrestAve=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$m%")->count();
    //$presentPersent= (int)(($stdPrestAve/$p)*100);
    $mtotal=($totalStudents*$p);
     $monthpresentPersent= (int)(($stdPrestAve/$mtotal)*100);
     ///yearly calculation


   return view('welcome')->with('totalStudents',$totalStudents)->with('totalTeachesrs',$totalTeachesrs)
                    ->with('totalStudentsMale',$totalStudentsMale)
                    ->with('totalStudentsFemale',$totalStudentsFemale)
                    ->with('today',$today_atten)
                    ->with('year',$year_percent)
                    ->with('m',$totalTeacherMale)
                    ->with('f',$totalTeacherFemale)
                    ->with('mon',$ms)
                    ->with('studentTodayReport',$studentTodayReport)
                    ->with('monthpresentPersent',$monthpresentPersent);
            }
            elseif(priv()==5){
              /****Parents****/
                                                $today=date('Y-m-d');
                $y=date("Y");
                //return $today;
                $totalStudents=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->count();
                $totalStudentsMale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
                $totalStudentsFemale=Students::where('status','=',1)->where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
                $totalTeachesrs=Teacher::where('institute_code', '=', Auth::user()->institute_id)->count();
                $teacherAttendence=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
                   $teacherAttendence1=Attendence::where('institute_code', '=', Auth::user()->institute_id)
                ->where('type','=','Teacher')->where('status','=',1)->where('created_at','LIKE',"%$today%")->count();

              $total= $teacherAttendence+$teacherAttendence1;
              //return $total;
                  $today_atten=(int)(($total/$totalTeachesrs)*100);
                  //return $today_atten;
         $a1=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();
         $a0=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$y%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay=$a1+$a0;
//return $ay;
     if ($y%4==0) {
      $x=366;
       $year_percent=(int)(($ay/$x)*100);
     }
     else{
       $yx=365;
       $year_percent=(int)(($ay/$yx)*100);
     }
                //return $atten_percent;
                // return $AtotalInstitute;
      $totalTeacherMale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Male')->count();
      $totalTeacherFemale=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('gender','=','Female')->count();
   $m=date("Y-m");
    ///$h=Holyday::where('holiday_date','LIKE',"%2016-03%")->get();
   //$h=Holyday::where('holiday_date','LIKE',"%$m%")->get();
   $d=date('t');

   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $p=$d-$at;
   //return $p;
 $a12=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',1)->count();

         $a02=Attendence::where('institute_code','=',Auth::user()->institute_id)
         ->where('created_at','LIKE',"%$m%")
         ->where('type','=','Teacher')
         ->where('status','=',0)->count();
         $ay2=$a12+$a02;
             //return $a12.$a02;
         $t=$totalTeachesrs*$p;
   $ms=(int)(($ay2/$t)*100);
   //return $ms;

   $at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
   $InstiHolyday=InstiHolyday::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
  // $InstiHolyday=AcademicCalender::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=', Auth::user()->institute_id)->count();
   //return $InstiHolyday;
   $p=$d-($at+$InstiHolyday);
   $ms=(int)(($p/$d)*100);
   //students attendence report saif...
   //today attendence calculation
   $totalStudents=Students::where('institute_code', '=', Auth::user()->institute_id)->count();
   $totalstudentsAtten=Attendence::where('institute_code', '=', Auth::user()->institute_id)
   ->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
    $studentTodayReport=(int)(($totalstudentsAtten/$totalStudents)*100);
    //monthly calculation
    $stdPrestAve=Attendence::where('institute_code','=',Auth::user()->institute_id)->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$m%")->count();
    //$presentPersent= (int)(($stdPrestAve/$p)*100);
    $mtotal=($totalStudents*$p);
     $monthpresentPersent= (int)(($stdPrestAve/$mtotal)*100);
     ///yearly calculation


   return view('welcome')->with('totalStudents',$totalStudents)->with('totalTeachesrs',$totalTeachesrs)
                    ->with('totalStudentsMale',$totalStudentsMale)
                    ->with('totalStudentsFemale',$totalStudentsFemale)
                    ->with('today',$today_atten)
                    ->with('year',$year_percent)
                    ->with('m',$totalTeacherMale)
                    ->with('f',$totalTeacherFemale)
                    ->with('mon',$ms)
                    ->with('studentTodayReport',$studentTodayReport)
                    ->with('monthpresentPersent',$monthpresentPersent);
            }
                  elseif(priv()==6){
                    /****Users****/
                return "Users";
            }
                    elseif(priv()==7){
                    /****Thana Officer****/
                return "Thana Officer";
            }
                    elseif(priv()==8){
                    /****District Officer****/
                return "District Officer";
            }
                    elseif(priv()==9){
                    /****Division Officer****/
                return "Divission Officer";
            }
                    elseif(priv()==10){
                    /****Board Officer****/
                return "Board Officer";
            }
            else {

                Session::flash('data', 'Not Logged In! Please Login to Continue.');
                return redirect::to('/');
            }
        } else {
            Session::flash('data', 'Not Logged In! Please Login to Continue.');
            return redirect::to('/');
        }
    }
    public function getAddStudent() {

        //Moin
//Student Registration get Function for admin
        $parents=Parents::where('institute_code','=',Auth::user()->institute_id)->lists('guradian_id','guardian_name');
        //$parents=Section::where('institute_code','=',Auth::user()->institute_id)->lists('section_id','section_name');

        $class=ClassAdd::where('institute_code','=',Auth::user()->institute_id)->lists('class_id','class_name');
        //$students=Students::where('institute_code','=',Auth::user()->institute_id)->get();
        $students = DB::table('tbl_studets')
            ->join('tbl_class','tbl_studets.class','=','tbl_class.class_id')
            ->select('tbl_studets.*','tbl_class.*')
            ->where('tbl_class.institute_code','=',Auth::user()->institute_id)
            ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
            ->get();
        // ->where('tbl_class.institute_code','tbl_studets.institute_code')
      //return $students;
        return view('admin.add_search_student')->with('parents',$parents)
            ->with('class',$class)
            ->with('students',$students);
    }

    public function postAddStudent(){
        //moin
        //Student Registration Post Function for asmin
        $parents = Input::get('guardian_name');
        $class = Input::get('class');
        //return $class;
        $parents_name = Parents::where('guradian_id', '=', $parents)->pluck('guardian_name');
        $class_name = ClassAdd::where('class_id', '=', $class)->pluck('class_name');
       // return $class_name.$class ;
        $email = Input::get('email');
        $userc = User::Where('email', '=', $email)->count();
        $marchant = Institute::Where('email', '=', $email)->count();
        if ($userc > 0) {
            Session::flash('data', 'This Email already used. Please Try a another email.');
            return Redirect::to('add/student');
        }else{
            $class = Input::get('class');
            //return $class;
            $parents_name = Parents::where('guradian_id', '=', $parents)->pluck('guardian_name');
            $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
            if(Input::hasFile('image')){
                // return 1;
                $extension = Input::file('image')->getClientOriginalExtension();
                if($extension=='png'||$extension=='jpg'||$extension=='jpeg'||$extension=='bmp'||
                    $extension=='PNG'||$extension=='jpg'||$extension=='JPEG'||$extension=='BMP'){
                    $date=date('dmyhsu');
                    $fname=$date.'.'.$extension;
                    $destinationPath = 'images/';
                    Input::file('image')->move($destinationPath,$fname);
                    $final=$fname;
                }
            }
            else{
                $final='';
            }

        //return $password;
        //return $name.$studentid.$institute.$guardian.$gender.$religion.$email.$phone.$class.$section.$roll.$user_type.$transport_rent.$birth_certificate.$image
        //   .$route_name.$status;

        $randomid=mt_rand('1', '999');
        $u=new User;
        $u->name=Input::get('firstname').' '.Input::get('lastname');
        $u->uid=$randomid.' '.Input::get('roll').' '.$iid;
        $u->priv=2;
        $u->user_type='Students';
        $u->user_name=Input::get('username');
        $u->email=$email;
        $u->institute_id=$iid;
        $u->password= Hash::make(Input::get('confirm_password'));
        $u->save();

        $su=new Students;
        $su->name=Input::get('firstname').' '.Input::get('lastname');
        $su->st_id=$randomid.' '.Input::get('roll').' '.$iid;
        $su->institute_code=$iid;
        $su->guardian_id=$parents;
        $su->guardian_name=$parents_name;
        $su->gender=Input::get('gender');
        $su->religion=Input::get('religion');
        $su->phone=Input::get('phone');
        $su->address=Input::get('address');
        $su->class=$class;
        $su->section=Input::get('section');
        $su->roll=Input::get('roll');
        $su->image=$final;
        $su->tran_route_name=Input::get('route_name');
        $su->transport_rent=Input::get('transport_rent');
        $su->user_type='Students';
        $su->status=1;
        $su->birth_certificate=Input::get('deth_of_birth');
        $su->email=$email;
        $su->password= Hash::make(Input::get('confirm_password'));
        $su->save();

            /*
            $mk=new Mark;
            $mk->student_name=Input::get('firstname').' '.Input::get('lastname');
            $mk->student_id=$randomid.' '.Input::get('roll').' '.$iid;
            $mk->institute_code=$iid;
            $mk->class_id=$class;
            $mk->class_name=$class_name;
            $mk->phone=Input::get('phone');
            $mk->roll=Input::get('roll');
            $mk->image=$final;
            $mk->save();
            */

        //return $su;
        Session::flash('data', 'Data successfully Added !');
        return Redirect::to('add/student');

    }
    }
    public function getInstituteReg(){
        //saif for admin
        $allinst=Institute::all();
        $division=Division::all()->lists('id','Division');
        return view('admin.reg_insiatute')->with('divisionlist',$division)->with('allinstuted',$allinst);
    }
    public function postInstituteReg() {
        //saif for admin
        $email = Input::get('email');
        $icode = Input::get('icode');
        $userc = User::where('institute_id', '=', $icode)->Where('email', '=', $email)->count();
        $marchant = Institute::where('institute_code', '=', $icode)->Where('email', '=', $email)->count();
        if ($userc > 0 || $marchant > 0) {
            Session::flash('data', 'Institute or Email was already used. Please Try a different number.');
            return Redirect::to('admin/institute/registration');
        } else {
            $division = Input::get('division');
            $district = Input::get('district');
            $thana = Input::get('thana');
            $insiatutename = Input::get('institute_name');
            $email = Input::get('email');
            $icode = Input::get('icode');
            $inphone = Input::get('iphone');
            $inaddress = Input::get('iaddress');
            $inurl = Input::get('inurl');
            $inpass = Input::get('password');
            $cofpass = Hash::make(Input::get('confirm_password'));
            // return $division.'/'.$district.'/'. $thana.'/'.$insiatute;
            $iu = new Institute;
            $iu->institute_name = $insiatutename;
            $iu->email = $email;
            $iu->institute_code = $icode;
            $iu->phone = $inphone;
            $iu->address = $inaddress;
            $iu->division = $division;
            $iu->district = $district;
            $iu->thana = $thana;
            $iu->url = $inurl;
            $iu->status = 1;
            $iu->save();
            $uin = new User;
            $uin->name = $insiatutename;
            $uin->institute_id = $icode;
            $uin->uid = $icode;
            $uin->user_name = $inurl;
            $uin->user_type = 'Institute';
            $uin->priv = 3;
            $uin->email = $email;
            $uin->password = $cofpass;
            $uin->save();
            $info = new InstituteInfo;
            $info->institute_code = $icode;
            $info->save();
            $incon = new InstituteContacts;
            $incon->institute_code = $icode;
            $incon->save();
            Session::flash('data', 'You successfully');
            return Redirect::to('admin/institute/registration');
        }
    }
    public function getAddParents() {
        //Moin
        //Parents Registration get Function For admin
        $parentsinfo = Parents::where('institute_code','=',Auth::user()->institute_id)->get();
        return view('parent.reg_parent')->with('parents', $parentsinfo);
    }
    public function postAddParents() {
        //Moin
        //Parents Registration post Function For admin
        $email = Input::get('email');
        $userc = User::Where('email', '=', $email)->count();
        $marchant = Institute::Where('email', '=', $email)->count();
        if ($userc > 0) {
            Session::flash('data', 'This Email already used. Please Try a another email.');
            return Redirect::to('admin/add/parents');
        }else{
            $iid = User::where('uid', '=', Auth::user()->uid)->pluck('institute_id');
            $gname = Input::get('gname');
            $fname = Input::get('father_name');
            $mname = Input::get('mother_name');
            $fprofession = Input::get('father_profession');
            $mprofession = Input::get('mother_profession');
            $religion = Input::get('religion');
            $address = Input::get('address');
            $phone = Input::get('phone');
            $national_id = Input::get('nid');
            $uname = Input::get('username');
            $uid = mt_rand('1', '9999'). ' ' .$iid;
            //return $uid;
            $pu = new User;
            $pu->name = $gname;
            $pu->uid = $uid;
            $pu->user_name = $uname;
            $pu->user_type = 'Parents';
            $pu->priv = 4;
            $pu->email = $email;
            $pu->password = Hash::make(Input::get('confirm_password'));
            $pu->institute_id= $iid;
            $pu->save();

            $pup = new Parents;
            $pup->guardian_name = $gname;
            $pup->institute_code = $iid;
            $pup->guradian_id = $uid;
            $pup->fathers_name = $fname;
            $pup->mothers_name = $mname;
            $pup->fathers_profession = $fprofession;
            $pup->mothers_profession = $mprofession;
            $pup->phone = $phone;
            $pup->address = $address;
            $pup->national_id = $national_id;
            $pup->religion = $religion;
            $pup->user_name = $uname;
            $pup->user_type = 'Parents';
            $pup->priv = 4;
            $pup->email = $email;
            $pup->password = Hash::make(Input::get('confirm_password'));
            $pup->save();
            Session::flash('data', 'Data successfully added !');
            return Redirect::to('admin/add/parents');
        }
    }
    public function getTeacherAddview() {
        //Moin
        //Teacher Registration get Function For Admin
        $teacherinfo = Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
        //return $teacherinfo;
        return view('teacher.reg_teacher')->with('teacher', $teacherinfo);
    }
    public function getAddTeacher() {
        //Moin
        //Teacher Registration get Function For Admin
        $teacherinfo = Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
        //return $teacherinfo;
        return view('teacher.teacherform')->with('teacher', $teacherinfo);
    }
    public function postAddTeacher() {
        //Moin
        //Teacher Registration post Function For Admin
        $email = Input::get('email');
        $userc = User::Where('email', '=', $email)->count();
        $marchant = Institute::Where('email', '=', $email)->count();
        if ($userc > 0) {
            Session::flash('data', 'This Email already used. Please Try a another email.');
            return Redirect::to('admin/add/teacher');
        }else{
            $iid = User::where('uid', '=', Auth::user()->uid)->pluck('institute_id');
            $name = Input::get('firstname') . ' ' . Input::get('lastname');
            $designation = Input::get('designation');
            $dbirth = Input::get('dbirth');
            $gender = Input::get('gender');
            $religion = Input::get('religion');
            $address = Input::get('address');
            $national_id = Input::get('nid');
            $join_date = Input::get('join_date');
            $phone = Input::get('phone');
            $username = Input::get('username');
            $uid =  mt_rand('00000', '99999'). ' ' .$iid ;
//$i=Input::get('image');
            if (Input::hasFile('image')) {
                //return 1;
                $extension = Input::file('image')->getClientOriginalExtension();
                if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'bmp' ||
                    $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPEG' || $extension == 'BMP') {
                    $date = date('dmyhsu');
                    $fname = $date . '.' . $extension;
                    $destinationPath = 'images/';
                    Input::file('image')->move($destinationPath, $fname);
                    $final = $fname;
                }
            } else {
                $final = '';
            }
            $tu = new User;
            $tu->name = $name;
            $tu->uid = $uid;
            $tu->user_name = $username;
            $tu->user_type = 'Teacher';
            $tu->priv = 4;
            $tu->email = $email;
            $tu->password = Hash::make(Input::get('confirm_password'));
            $tu->institute_id = $iid;
            $tu->save();

            $ut = new Teacher;
            $ut->institute_code = $iid;
            $ut->teacher_id = $uid;
            $ut->name = $name;
            $ut->designation = $designation;
            $ut->birth_date = $dbirth;
            $ut->gender = $gender;
            $ut->religion = $religion;
            $ut->email = $email;
            $ut->phone = $phone;
            $ut->address = $address;
            $ut->join_date = $join_date;
            $ut->national_id = $national_id;
            $ut->user_name = $username;
            $ut->image = $final;
            $ut->password = Hash::make(Input::get('confirm_password'));
            $ut->user_type = 'Teacher';
            $ut->save();
            Session::flash('data', 'Data successfully added !');
            return Redirect::to('admin/add/teacher');
        }
    }
    public function viewinstuted($icode) {
        //saif for admin
        //return $icode;
        $detailsinist = Institute::where('institute_code', '=', $icode)->first();
        return view('admin.instutedDetails')->with('detailinf', $detailsinist);
    }
    public function editinstutedinfo($incode) {
        //saif for admin
        // $division=  Institute::where('institute_code', '=', $incode)
        //$district=  Institute::where('institute_code', '=', $incode)
        //$thana=  Institute::where('institute_code', '=', $incode)
        $division=Division::all()->lists('id','Division');
        $detailsinist = Institute::where('institute_code', '=', $incode)->first();
        return view('admin.instutededit')->with('detailinf', $detailsinist)->with('division',$division);
    }
    public function editinstutedinfoupdate($iucode) {
        //saif admin
        $name = Input::get('institute_name');
        $district = Input::get('district');
        $thana = Input::get('thana');
        $email = Input::get('email');
        $inphone = Input::get('phone');
        $inaddress = Input::get('iaddress');
        $inurl = Input::get('inurl');
        $infoupdate = Institute::where('institute_code', '=', $iucode)->update(['institute_name' => $name, 'email' => $email, 'phone' => $inphone, 'address' => $inaddress, 'district' => $district, 'thana' => $thana, 'url' => $inurl]);
        $infoupdate = Institute::where('institute_code', '=', $iucode)->update(['email' => $email,'name' => $name]);

        Session::flash('data', 'You successfully');
        return Redirect::to('institute/edit/' . $iucode);
    }
    public function deleteinstutedinfo($idcode) {
        //saif for admin
        $infoDelete = Institute::where('institute_code', '=', $idcode)->delete();
        $infoDelete = User::where('institute_id', '=', $idcode)->delete();
        Session::flash('data', 'You successfully');
        return Redirect::to('admin/institute/registration');
    }
    public  function getAddSubject(){
        //Moin
        //Subject Adding get Function for admin
        $teacher = Teacher::where('institute_code','=',Auth::user()->institute_id)->lists('teacher_id', 'name');
        $class = ClassAdd::where('institute_code','=',Auth::user()->institute_id)->lists('class_id', 'class_name');
        $subinfo= Subject::where('institute_code','=',Auth::user()->institute_id)->get();
        return view('admin.addsubject')->with('teacher',$teacher)->with('class',$class)->with('allsubinfo',$subinfo);
    }
    public function postAddSubject() {
        //Moin
        //Subject Adding post Function for admin
        $teacher = Input::get('subteacher');
        $class = Input::get('subclass');
        //return $class;
        $teacher_name = Teacher::where('teacher_id', '=', $teacher)->pluck('name');
        $class_name = ClassAdd::where('class_id', '=', $class)->pluck('class_name');
        $iid = User::where('uid', '=', Auth::user()->uid)->pluck('institute_id');
        $subcode=Input::get('subcode');
        $getSubCode=Subject::where('class_id','=',$class)->where('institute_code','=',$iid)->where('subject_code','=',$subcode)->count('subject_code');
        //return $getSubCode;
        if ($getSubCode!=0) {
          Session::flash('data', 'Subject Code Already Used Try another !');
        return Redirect::to('admin/add/subject');
        }
        else{
        //return $iid;
        $subnote = new Subject;
        $subnote->institute_code = $iid;
        $subnote->subject_name = Input::get('subname');
        $subnote->subject_code = $subcode;
        $subnote->class_id = Input::get('subclass');
        $subnote->class_name = $class_name;
        $subnote->teacher_id = Input::get('subteacher');
        $subnote->teacher_name = $teacher_name;
        $subnote->sub_author = Input::get('subauth');
        $subnote->note = Input::get('subnote');
        $subnote->save();
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('admin/add/subject');
        }
    }
    public function deleteSubject($sid){
       $iid = User::where('uid', '=', Auth::user()->uid)->pluck('institute_id');
      
       $infoDelete = Subject::where('institute_code', '=', $iid)->where('subject_code','=',$sid)->delete();
        Session::flash('data', 'Subject deleted successfully !');
        return Redirect::to('admin/add/subject');
    }
    public function viewDetailsInstitute(){
      $listInst=Institute::all();
      return  view('superadmin.ListofInstitute')->with('allinstuted',$listInst);
    }
    public function instituteReport($Iid){

        /****Admin****/
          $today=date('Y-m-d');
          $y=date("Y");
          //return $today;
          $totalStudents=Students::where('status','=',1)->where('institute_code', '=', $Iid)->count();
          $totalStudentsMale=Students::where('status','=',1)->where('institute_code', '=', $Iid)->where('gender','=','Male')->count();
          $totalStudentsFemale=Students::where('status','=',1)->where('institute_code', '=', $Iid)->where('gender','=','Female')->count();
          $totalTeachesrs=Teacher::where('institute_code', '=',$Iid)->count();
          $teacherAttendence=Attendence::where('institute_code', '=',$Iid)
          ->where('type','=','Teacher')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
             $teacherAttendence1=Attendence::where('institute_code', '=',$Iid)
          ->where('type','=','Teacher')->where('status','=',1)->where('created_at','LIKE',"%$today%")->count();

        $total= $teacherAttendence+$teacherAttendence1;
        //return $total;
            $today_atten=(int)(($total/$totalTeachesrs)*100);
            //return $today_atten;
   $a1=Attendence::where('institute_code','=',$Iid)
   ->where('created_at','LIKE',"%$y%")
   ->where('type','=','Teacher')
   ->where('status','=',1)->count();
   $a0=Attendence::where('institute_code','=',$Iid)
   ->where('created_at','LIKE',"%$y%")
   ->where('type','=','Teacher')
   ->where('status','=',0)->count();
   $ay=$a1+$a0;
//return $ay;
if ($y%4==0) {
$x=366;
 $year_percent=(int)(($ay/$x)*100);
}
else{
 $yx=365;
 $year_percent=(int)(($ay/$yx)*100);
}
          //return $atten_percent;
          // return $AtotalInstitute;
$totalTeacherMale=Teacher::where('institute_code', '=', $Iid)->where('gender','=','Male')->count();
$totalTeacherFemale=Teacher::where('institute_code', '=', $Iid)->where('gender','=','Female')->count();
$m=date("Y-m");
///$h=Holyday::where('holiday_date','LIKE',"%2016-03%")->get();
//$h=Holyday::where('holiday_date','LIKE',"%$m%")->get();
$d=date('t');

$at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
$p=$d-$at;
//return $p;
$a12=Attendence::where('institute_code','=',$Iid)
   ->where('created_at','LIKE',"%$m%")
   ->where('type','=','Teacher')
   ->where('status','=',1)->count();

   $a02=Attendence::where('institute_code','=',$Iid)
   ->where('created_at','LIKE',"%$m%")
   ->where('type','=','Teacher')
   ->where('status','=',0)->count();
   $ay2=$a12+$a02;
       //return $a12.$a02;
   $t=$totalTeachesrs*$p;
$ms=(int)(($ay2/$t)*100);

$at=Holyday::where('holiday_date','LIKE',"%$m%")->count();
$InstiHolyday=InstiHolyday::where('holiday_date','LIKE',"%$m%")->where('institute_code', '=',$Iid)->count();
$InstiWeekEnd=AcademicCalender::where('institute_code', '=', $Iid)->pluck('weekendday');
$WeekEnd1=str_limit($InstiWeekEnd,3,'');
$WeekEnd2= substr($InstiWeekEnd,4);
$WeekEnd3= substr($InstiWeekEnd,9);
//   return date('d', strtotime($WeekEnd1));

$month = date('m');
$year = date("Y");
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);

for($i=$start_time; $i<$end_time; $i+=86400)
{
$list[] = date('D', $i);

}
$p=$d-($at+$InstiHolyday);
$ms=(int)(($p/$d)*100);
//students attendence report saif...
//today attendence calculation
$totalStudents=Students::where('institute_code', '=', $Iid)->count();
$totalstudentsAtten=Attendence::where('institute_code', '=', $Iid)
->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$today%")->count();
$studentTodayReport=(int)(($totalstudentsAtten/$totalStudents)*100);
//monthly calculation
$stdPrestAve=Attendence::where('institute_code','=',$Iid)->where('type','=','Student')->where('status','=',0)->where('created_at','LIKE',"%$m%")->count();
//$presentPersent= (int)(($stdPrestAve/$p)*100);
$mtotal=($totalStudents*$p);
$monthpresentPersent= (int)(($stdPrestAve/$mtotal)*100);
///yearly calculation


return  view('superadmin.ListofInstituteReport')->with('totalStudents',$totalStudents)->with('totalTeachesrs',$totalTeachesrs)
              ->with('totalStudentsMale',$totalStudentsMale)
              ->with('totalStudentsFemale',$totalStudentsFemale)
              ->with('today',$today_atten)
              ->with('year',$year_percent)
              ->with('m',$totalTeacherMale)
              ->with('f',$totalTeacherFemale)
              ->with('mon',$ms)
              ->with('studentTodayReport',$studentTodayReport)
              ->with('monthpresentPersent',$monthpresentPersent);

    }
    public function getRoomNumberView(){
      $room=Room::where('institute_code','=',Auth::user()->institute_id)->orderBy('room_no','ASC')->get();
      return view('admin.addroom',['room'=>$room]);
    }
    public function PostRoomNumberView(){
      $roomnum=Input::get('rnumber');
      $roomnocheck=Room::where('institute_code','=',Auth::user()->institute_id)->where('room_no','=',$roomnum)->count();
       if ($roomnocheck==1) {
        Session::flash('warn', 'This Room already allocated for another class Please Try another !');
        return Redirect::to('add/room/number');
      }
      else{
         $iid=Institute::where('institute_code','=',Auth::user()->institute_id)->pluck('institute_code');
      // /return $iid;
      $radd=New Room;
      $radd->institute_code=$iid;
      $radd->room_name=Input::get('rname');
      $radd->room_no=Input::get('rnumber');
      $radd->note=Input::get('note');
      $radd->save();
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('add/room/number');
      }
     
    }
}
function priv() {
    return Auth::user()->priv;
}
