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

$m=date("Y-m");
          $teacheratten1=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',1)->count();
                  $teacheratten2=Attendence::where('created_at','LIKE',"%$m%")
                  ->where('type','=','Teacher')
                  ->where('status','=',0)->count();
                  return $total=$teacheratten1+ $teacheratten2;
  $tcurrent=(int) (($total/$allteacherworkday)*100);
  $t=Attendence::where('type','=','Teacher')
  
  ->where('status','=',1)
  ->count();
    $t1=Attendence::where('type','=','Teacher')
  
  ->where('status','=',0)
  ->count();
  return $t+$t1;
$teac1 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=','DHAKA')
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
$teac2 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=','DHAKA')
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count();
            //print_r($users);
            return $teac1+$teac2;
/************ Current Month Teacher Attdence Percentage End ****************/
        return view('admin.reports.currentmonthteacher');
    }

    public function getLastSixmonthTeacher()
    {
        return view('admin.reports.sixmonthteacher');
    }

    public function getLastOneYearTeacher()
    {
        return view('admin.reports.oneyearteacher');
    }

    public function getCurrentMonthWiseStudent()
    {
        return view('admin.reports.currentmonthstudent');
    }


    public function getLastSixmonthsStudent()
    {
        return view('admin.reports.sixmonthstudents');
    }

    public function getLastOneYearStudents()
    {
        return view('admin.reports.oneyeartudents');
    }
    public function getAllDivisionTeacher(){
        return view('admin.reports.teacherdivision');
    }
}
