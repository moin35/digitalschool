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
use App\Attendence;
use Illuminate\Support\Facades\DB;

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





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postTeacherAttendence($tid)
    {
        $teacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->where('teacher_id','=',$tid)->first();
        $uid=$teacher->teacher_id;
        $iid=$teacher->institute_code;
        $type=$teacher->user_type;
        $up=new Attendence;
        $up->institute_code=$iid;
        $up->uid=$uid;
        $up->type=$type;
        $up->status=1;
        $up->save();
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

     return view('admin.attendence.studentsAttendence')->with('allclass',$this->getallclass())->with('GetStudents',$GetStudents)
     ->with('sectionName',$sectionName)->with('classId',$clasId)->with('dateTime',$dateTime);

       //return $GetStudents;

    }

}
