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

public function getDetailStudents($id){
    //Moin
    //Student Detail get Function for admin
    $getstudent=Students::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=',$id)->first();
    //return $getstudent->institute_code;
    return view('admin.studentdetail',['individualstudent'=>$getstudent]);

}

    public function getStudentsEdit($id){
        //Moin
        //Student edit get Function for admin
        $parents = Parents::where('institute_code','=',Auth::user()->institute_id)->lists('guradian_id', 'guardian_name');
        $class = ClassAdd::where('institute_code','=',Auth::user()->institute_id)->lists('class_id', 'class_name');
        $icode= User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        $editstudent=Students::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->first();
        //return $editstudent;
        return view('admin.editstudents',['studentedit'=>$editstudent,'teacher'=>$parents,'class'=>$class,'icode'=>$icode]);
    }
    public function UpdateStudentsEdit($id){
        //Moin
        //Student Update Function for admin
        $name=Input::get('name');
        $roll=Input::get('roll');
        $gid=Input::get('gname');
        $class=Input::get('class');
        $section=Input::get('section');
        $religion=Input::get('religion');
        $bdate=Input::get('bdate');
        $gender=Input::get('gender');
        $email=Input::get('email');
        $phone=Input::get('phone');
        $address=Input::get('address');
        $gname = Parents::where('guradian_id', '=', $gid)->pluck('guardian_name');
        if(Input::hasFile('image')){
            // return 1;
            $extension = Input::file('image')->getClientOriginalExtension();
            if($extension=='png'||$extension=='jpg'||$extension=='jpeg'||$extension=='bmp'||
                $extension=='PNG'||$extension=='jpg'||$extension=='JPEG'||$extension=='BMP'){
                $date=date('dmyhsu');
                $fname=$name.mt_rand('1', '999').'.'.$extension;
                $destinationPath = 'images/';
                Input::file('image')->move($destinationPath,$fname);
                $final=$fname;
            }
        }
        else{
            $final='';
        }
        //return $final;
        //return $name.'/'.$roll.'/'.$gname.'/'.$class.'/'.$section.'/'.$religion.'/'.$bdate.'/'.$gender.'/'.$email.'/'.$phone.'/'.$address.'/'.$image;
        $studentup = Students::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=', $id)
            ->update(['name' => $name,
                'guardian_id' => $gid,
                'guardian_name' => $gname,
                'gender' => $gender,
                'religion' => $religion,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'class' => $class,
                'section' => $section,
                'roll' => $roll,
                'image' => $final,
                'birth_certificate' => $bdate
                ]);
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('student/edit/' .$id);
    }
    public function deleteStudentInfo($uid) {
        //Moin
        //Student Delete Function for admin

        $infoDelete = Students::where('institute_code', '=', Auth::user()->institute_id)->where('st_id', '=', $uid)->delete();
        $infoDelete = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $uid)->delete();
        Session::flash('data', 'Data successfully deleted !');
        return Redirect::to('add/student');
    }
    public function postStudentSearch(){
        //return 1;
        $procategory=Input::get('categ');
        //return $procategory;
        if($procategory!='')
        {
            //return $pname.'/'.$hprice.'/'.$lprice.'/'.$marchant;
            $mid=AddProducts::where('category','LIKE',$procategory)->pluck('uid');
            $categoryserarchresult=AddProducts::where('category','LIKE',"%$procategory%")
                ->where('uid','=',$mid)
                ->get();
            //return  $categoryserarchresult;
            return view('catsearchresult')->with('psearch',$categoryserarchresult);

        }

    }

    public function searchStudentsByClass(){
        return 1;
    }

    public function markIndex(){
      $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
      $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
      $section = Section::where('institute_code', '=', Auth::user()->institute_id)->get();
      return view('admin.markindex')->with('section', $section)->with('teacher', $teacher)->with('allclass', $class);
    }

    public function markadd(){
      $examName=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id', 'exam_name');
      $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
      $examSubj=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('subject_code', 'subject_name');

      return view('admin.markadd')->with('allclass', $class);
    }




}
