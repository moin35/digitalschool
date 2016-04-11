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
