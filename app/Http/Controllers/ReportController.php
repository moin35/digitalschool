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

class ReportController extends Controller
{

    public function getAllReport()
    {
        return "OK";
    }

    public function getCurrentMonthWiseTeacher()
    {
        //return 1;
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
/*********** Barisal Division Percentage Start*******/
$teac1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherbarisal= $teac1+$teac2;
            $barisaltotal=(int) (($sumteacherbarisal/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$teac3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherchittagong= $teac3+$teac4;
            $chittagongtotal=(int) (($sumteacherchittagong/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$teac5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacher= $teac5+$teac6;
            $dhakatotal=(int) (($sumteacher/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$teac7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumkhulna= $teac7+$teac8;
            $khulnatotal=(int) (($sumkhulna/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$teac9 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac10 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrajshahi= $teac9+$teac10;
            $rajshahitotal=(int) (($sumrajshahi/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$teac11 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac12 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrangpur= $teac11+$teac12;
            $rangpurtotal=(int) (($sumrangpur/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$teac13 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac14 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumsylhet= $teac13+$teac14;
            $sylhettotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$teac15 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac16 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $summymensingh= $teac15+$teac16;
            $mymensinghtotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/
/************ Current Month Teacher Attdence Percentage End ****************/
        return view('admin.reports.currentmonthteacher',
          ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }

    public function getLastSixmonthTeacher()
    {
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
$allteacherworkday=$months-$weeksix;
/*********** Barisal Division Percentage Start*******/
$teac1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
           ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherbarisal= $teac1+$teac2;
            $barisaltotal=(int) (($sumteacherbarisal/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$teac3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherchittagong= $teac3+$teac4;
            $chittagongtotal=(int) (($sumteacherchittagong/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$teac5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacher= $teac5+$teac6;
            $dhakatotal=(int) (($sumteacher/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$teac7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumkhulna= $teac7+$teac8;
            $khulnatotal=(int) (($sumkhulna/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$teac9 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac10 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrajshahi= $teac9+$teac10;
            $rajshahitotal=(int) (($sumrajshahi/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$teac11 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac12 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrangpur= $teac11+$teac12;
            $rangpurtotal=(int) (($sumrangpur/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$teac13 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac14 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumsylhet= $teac13+$teac14;
            $sylhettotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$teac15 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac16 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $summymensingh= $teac15+$teac16;
            $mymensinghtotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/

/* Teacher Six month calculation End */
        return view('admin.reports.sixmonthteacher',
           ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }

    public function getLastOneYearTeacher()
    {
            /*** One Year day count Start ***/
$d1 = date("Y-m-d");
$d2= date("Y-m-d", strtotime("-12 months"));
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
//return $weeksix;
/* Teacher Six month calculation start */
$allteacherworkday=$months-$weeksix;
/*********** Barisal Division Percentage Start*******/
$teac1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
           ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherbarisal= $teac1+$teac2;
            $barisaltotal=(int) (($sumteacherbarisal/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$teac3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacherchittagong= $teac3+$teac4;
            $chittagongtotal=(int) (($sumteacherchittagong/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$teac5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacher= $teac5+$teac6;
            $dhakatotal=(int) (($sumteacher/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$teac7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumkhulna= $teac7+$teac8;
            $khulnatotal=(int) (($sumkhulna/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$teac9 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac10 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrajshahi= $teac9+$teac10;
            $rajshahitotal=(int) (($sumrajshahi/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$teac11 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac12 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumrangpur= $teac11+$teac12;
            $rangpurtotal=(int) (($sumrangpur/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$teac13 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac14 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumsylhet= $teac13+$teac14;
            $sylhettotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$teac15 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac16 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $summymensingh= $teac15+$teac16;
            $mymensinghtotal=(int) (($sumsylhet/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/
        return view('admin.reports.oneyearteacher',
          ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }

    public function getCurrentMonthWiseStudent()
    {
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
/*********** Barisal Division Percentage Start*******/
$std1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
           // return $std1;
            $barisaltotal=(int) (($std1/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$std2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std2;
            $chittagongtotal=(int) (($std2/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$std3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std3;
            $dhakatotal=(int) (($std3/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$std4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std4;

            $khulnatotal=(int) (($std4/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$std5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std5;
            $rajshahitotal=(int) (($std5/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$std6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std6;

            $rangpurtotal=(int) (($std6/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$std7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std7;

            $sylhettotal=(int) (($std7/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$std8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Student')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $mymensinghtotal=(int) (($std8/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/
        return view('admin.reports.currentmonthstudent',
            ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }


    public function getLastSixmonthsStudent()
    {
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
$allteacherworkday=$months-$weeksix;
/*********** Barisal Division Percentage Start*******/
$std1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Student')
           ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std1;
            $barisaltotal=(int) (($std1/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$std2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std2;

            $chittagongtotal=(int) (($std2/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$std3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std3;

            $dhakatotal=(int) (($std3/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$std4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std4;

            $khulnatotal=(int) (($std4/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$std5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std5;

            $rajshahitotal=(int) (($std5/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$std6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std5;
            $rangpurtotal=(int) (($std6/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$std7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;

            $sylhettotal=(int) (($std7/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$std8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $std8;

            $mymensinghtotal=(int) (($std8/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/

        return view('admin.reports.sixmonthstudents',
           ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }

    public function getLastOneYearStudents()
    {
                    /*** One Year day count Start ***/
$d1 = date("Y-m-d");
$d2= date("Y-m-d", strtotime("-12 months"));
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
//return $weeksix;
/* Teacher Six month calculation start */
$allteacherworkday=$months-$weeksix;
/*********** Barisal Division Percentage Start*******/
$std1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',1)
            ->where( 'tbl_attendence.type','=','Student')
           ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $barisaltotal=(int) (($std1/$allteacherworkday)*100);   
/*********** Barisal Division Percentage End*******/
/*********** Chittagong Division Percentage Start*******/
$std2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',2)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $chittagongtotal=(int) (($std2/$allteacherworkday)*100);   
/*********** Chittagong Division Percentage End*******/
/*********** Dhaka Division Percentage Start*******/
$std3 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',3)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $dhakatotal=(int) (($std3/$allteacherworkday)*100);   
/*********** Dhaka Division Percentage End*******/
/*********** Khulna Division Percentage Start*******/
$std4 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',4)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;

            $khulnatotal=(int) (($std4/$allteacherworkday)*100);   
/*********** Khulna Division Percentage End*******/
/*********** Rajshahi Division Percentage Start*******/
$std5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',5)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $rajshahitotal=(int) (($std5/$allteacherworkday)*100);   
/*********** Rajshahi Division Percentage End*******/
/*********** Rangpur Division Percentage Start*******/
$std6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',6)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;

            $rangpurtotal=(int) (($std6/$allteacherworkday)*100);   
/*********** Rangpur Division Percentage End*******/
/*********** Sylhet Division Percentage Start*******/
$std7 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;

            $sylhettotal=(int) (($std7/$allteacherworkday)*100);   
/*********** Sylhet Division Percentage End*******/
/*********** MYMENSINGH Division Percentage Start*******/
$std8 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',8)
            ->where( 'tbl_attendence.type','=','Student')
            ->whereBetween('tbl_attendence.created_at',[$d2,$d1])
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
            $mymensinghtotal=(int) (($std8/$allteacherworkday)*100);   
/*********** MYMENSINGH Division Percentage End*******/
        return view('admin.reports.oneyeartudents',
          ['dhakathismonth'=>$dhakatotal,
          'barisalthismonth'=>$barisaltotal,
          'chittagongthismonth'=>$chittagongtotal,
          'khulnathismonth'=>$khulnatotal,
          'rajshahithismonth'=>$rajshahitotal,
          'rangpurthismonth'=>$rangpurtotal,
          'sylhetthismonth'=>$sylhettotal,
          'mymensinghthismonth'=>$mymensinghtotal
          ]);
    }
    public function getAllDistrictTeacher(){
          //return $dhakadivision;
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $dhakadivision= District::where('division_id','=',3)->orderBy('district','ASC')->get();
    
   return view('admin.reports.teacherdistrict',
            [  'dhakadivision'=>$dhakadivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
    
    }
    public function getThana($dis){
        //return $dhakadivision;
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
$thana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.cmonth_teacher_thana',
    [
        'thana'=>$thana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
    }
    public function getDhakaTeacherSix(){
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
$allteacherworkday=$months-$weeksix;
   $dhakadivision= District::where('division_id','=',3)->orderBy('district','ASC')->get();
        return view('admin.reports.six_teacher_district',[
                    'dhakadivision'=>$dhakadivision,
                'allteacherworkday'=>$allteacherworkday,
                'd1'=>$d1,
                'd2'=>$d2  
            ]);
    }
public function getThanaSix($dis){
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
$allteacherworkday=$months-$weeksix;
$thana=Thana::where('district_name','=',$dis)->get();
         return view('admin.reports.six_teacher_thana',[
                    'thana'=>$thana,
                'allteacherworkday'=>$allteacherworkday,
                'd1'=>$d1,
                'd2'=>$d2  
            ]);
}
public function getDhakaOneYearTeacher(){
       /*** One Year day count Start ***/
$d1 = date("Y-m-d");
$d2= date("Y-m-d", strtotime("-12 months"));
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
//return $weeksix;
/* Teacher Six month calculation start */
$allteacherworkday=$months-$weeksix;
$dhakadivision= District::where('division_id','=',3)->orderBy('district','ASC')->get();
          return view('admin.reports.one_year_teacher_district',[
                    'dhakadivision'=>$dhakadivision,
                'allteacherworkday'=>$allteacherworkday,
                'd1'=>$d1,
                'd2'=>$d2  
            ]);
}
public function getDhakaOneYearThana($dis){
          /*** One Year day count Start ***/
$d1 = date("Y-m-d");
$d2= date("Y-m-d", strtotime("-12 months"));
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
//return $weeksix;
/* Teacher Six month calculation start */
$allteacherworkday=$months-$weeksix;
$thana=Thana::where('district_name','=',$dis)->get();
         return view('admin.reports.one_year_teacher_thana',[
                    'thana'=>$thana,
                'allteacherworkday'=>$allteacherworkday,
                'd1'=>$d1,
                'd2'=>$d2  
            ]);
}
public function getAllDistrictStudent(){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
$dhakadivision= District::where('division_id','=',3)->orderBy('district','ASC')->get();
    
   return view('admin.reports.cmonth_student_district',
            [  'dhakadivision'=>$dhakadivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}

public function getStudentCmonthThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
$thana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.cmonth_teacher_thana',
    [
        'thana'=>$thana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}

public function getChittagongDis(){
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
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
  $chittagongdivision= District::where('division_id','=',2)->orderBy('district','ASC')->get(); 
   return view('admin.reports.dischittagong',
            [  'chittagongdivision'=>$chittagongdivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}

public function getBarisalDis(){
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
//return count($list);
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $barisaldivision= District::where('division_id','=',1)->orderBy('district','ASC')->get(); 
   return view('admin.reports.disbarisal',
            [  'barisaldivision'=>$barisaldivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}


public function getRajshahiDis(){
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
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $rajshahidivision= District::where('division_id','=',5)->orderBy('district','ASC')->get(); 
   return view('admin.reports.disrajshahi',
            [  'rajshahidivision'=>$rajshahidivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}


public function getSylhetDis(){
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
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $sylhetdivision= District::where('division_id','=',7)->orderBy('district','ASC')->get(); 
   return view('admin.reports.dissylhet',
            [  'sylhetdivision'=>$sylhetdivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}



public function getRangpurDis(){
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
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $rangpurdivision= District::where('division_id','=',6)->orderBy('district','ASC')->get(); 
   return view('admin.reports.disrangpur',
            [  'rangpurdivision'=>$rangpurdivisionrangpurdivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}

public function getKhulnaDis(){
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
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $khulnadivision= District::where('division_id','=',4)->orderBy('district','ASC')->get(); 
   return view('admin.reports.diskhulna',
            [  'khulnadivision'=>$khulnadivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}

public function getMymenshinghDis(){
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
//return count($list);
/************ Current Month Total Day Count End **************/
/*********** Current Month Total weekend Count Start ***********/
              $t=date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
              $e=date('Y-m-d', mktime(0, 0, 0, date('m')+1, 0, date('Y')));
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
//return $allteacherworkday;
$m=date("Y-m");
  $mymenshinghdivision= District::where('division_id','=',8)->orderBy('district','ASC')->get(); 
   return view('admin.reports.dismymenshingh',
            [  'mymenshinghdivision'=>$mymenshinghdivision,
                'allteacherworkday'=>$allteacherworkday,
                'm'=>$m  
            ]);
}

    public function getChittagongThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$chittagongthana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanachittagong',
    [
        'chittagongthana'=>$chittagongthana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}

    public function getBarisalThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$barisalthana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanabarisal',
    [
        'barisalthana'=>$barisalthana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}
    public function getRajshahiThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$rajshahithana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanarajshahi',
    [
        'rajshahithana'=>$rajshahithana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}
    public function getSylhetThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$sylhethana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanasylhet',
    [
        'sylhethana'=>$sylhethana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}
    public function getRangpurThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$rangpurthana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanarangpur',
    [
        'rangpurthana'=>$rangpurthana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}
    public function getKhulnaThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$khulnathana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanakhulna',
    [
        'khulnathana'=>$khulnathana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}
    public function getMymenshinghThana($dis){
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
/************ Current Month Total weekend Count End ****************/
$workday= $daycount-$week;
/************ Current Month Teacher Attdence Percentage Start ****************/
$teacher= Teacher::all()->count();
$allteacherworkday=$workday*$teacher;
$m=date("Y-m");
$mymenshinghthana=Thana::where('district_name','=',$dis)->get();
return view('admin.reports.thanamymenshingh',
    [
        'mymenshinghthana'=>$mymenshinghthana,
       'allteacherworkday'=>$allteacherworkday,
        'm'=>$m  
    ]);
}





}
