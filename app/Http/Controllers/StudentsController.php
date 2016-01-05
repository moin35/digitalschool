<?php
namespace App\Http\Controllers;

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
class StudentsController extends Controller
{
    public function getEditSubject($scode) {
       //Moin
        //Subject Update get Function For admin
        $teacher = Teacher::where('institute_code','=',Auth::user()->institute_id)->lists('teacher_id', 'name');
        $class = ClassAdd::where('institute_code','=',Auth::user()->institute_id)->lists('class_id', 'class_name');
        $icode= User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        $editsub = Subject::where('institute_code', '=', Auth::user()->institute_id)->where('subject_code', '=', $scode)->first();
        //return $editsub->class_name;

        return view('admin.editsubject')
            ->with('subedit', $editsub)
            ->with('teacher',$teacher)
            ->with('class',$class)
            ->with('icode',$icode);
    }

    public function postUpdateSubject($scode) {
        //Moin
        //Subject Update post Function For admin
        //return $scode;
        $teacher = Input::get('subteacher');
        $class = Input::get('subclass');

        $teacher_name = Teacher::where('teacher_id', '=', $teacher)->pluck('teacher_id');
        $class_name = ClassAdd::where('class_id', '=', $class)->pluck('class_id');

        $subname= Input::get('subname');
        $subcode= Input::get('subcode');
        $subclass= Input::get('subclass');
        $class_name= $class_name;
        $subteacher= Input::get('subteacher');
        $teacher_name= $teacher_name;
        $subauth= Input::get('subauth');
        $subnote= Input::get('note');
        //return $subname.$subcode.$subclass.$class_name.$subteacher.$teacher_name.$subauth.$subnote;
        $subupdate = Subject::where('institute_code', '=', Auth::user()->institute_id)->where('subject_code', '=', $scode)
            ->update(['subject_name' => $subname,
                'subject_code' => $subcode,
                'class_name' => $subclass,
                'class_id' => $class_name,
                'teacher_name' => $subteacher,
                'teacher_id' => $teacher_name,
                'sub_author' => $subauth,
                'note' => $subnote]);

        Session::flash('data', 'Data successfully added !');
        return Redirect::to('admin/edit/subject/' .$scode);
    }
}
