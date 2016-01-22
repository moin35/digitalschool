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
use Illuminate\Support\Facades\DB;
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
            if (priv() == 1) {
                return view('welcome');
            } else {
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
           // ->where('tbl_class.institute_code','tbl_studets.institute_code')
            ->where('tbl_class.institute_code','=',Auth::user()->institute_id)
            ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
            ->get();
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

    $parents_name = Parents::where('guradian_id', '=', $parents)->pluck('guardian_name');
    $class_name = ClassAdd::where('class_id', '=', $class)->pluck('class_name');


    $email = Input::get('email');
    $userc = User::Where('email', '=', $email)->count();
    $marchant = Institute::Where('email', '=', $email)->count();
    if ($userc > 0) {
        Session::flash('data', 'This Email already used. Please Try a another email.');

        return Redirect::to('add/student');
    }else{
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
//return $final;

        //return $password;
        //return $name.$studentid.$institute.$guardian.$gender.$religion.$email.$phone.$class.$section.$roll.$user_type.$transport_rent.$birth_certificate.$image
        //   .$route_name.$status;


        $u=new User;
        $u->name=Input::get('firstname').' '.Input::get('lastname');
        $u->uid=$iid.','.Input::get('roll');
        $u->priv=2;
        $u->user_type='Students';
        $u->user_name=Input::get('username');
        $u->email=$email;
        $u->password= Hash::make(Input::get('confirm_password'));
        $u->save();

        $su=new Students;
        $su->name=Input::get('firstname').' '.Input::get('lastname');
        $su->st_id=$iid.','.Input::get('roll');
        $su->institute_code=$iid;
        $su->guardian_id=$parents;
        $su->guardian_name=$parents_name;
        $su->gender=Input::get('gender');
        $su->religion=Input::get('religion');
        $su->phone=Input::get('phone');
        $su->address=Input::get('address');
        $su->class=$class_name;
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
            $uid = $iid . ' ' . mt_rand('1', '9999');

            //return $uid;
            $pu = new User;
            $pu->name = $gname;
            $pu->uid = $uid;
            $pu->user_name = $uname;
            $pu->user_type = 'Parents';
            $pu->priv = 4;
            $pu->email = $email;
            $pu->password = Hash::make(Input::get('confirm_password'));
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

    public function getAddTeacher() {
        //Moin
        //Teacher Registration get Function For Admin
        $teacherinfo = Teacher::where('institute_code','=',Auth::user()->institute_id)->get();
        //return $teacherinfo;
        return view('teacher.reg_teacher')->with('teacher', $teacherinfo);
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
            $uid = $iid . ' ' . mt_rand('00000', '99999');
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
        //return $iid;
        $subnote = new Subject;
        $subnote->institute_code = $iid;
        $subnote->subject_name = Input::get('subname');
        $subnote->subject_code = Input::get('subcode');
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

function priv() {
    return Auth::user()->priv;
}
