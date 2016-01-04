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
        return view('superadmin.add_search_student');
    }
 
public function postAddStudent(){
        $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
              $name=Input::get('firstname').' '.Input::get('lastname');
             $studentid = mt_rand('1100','9999');
             $uid=$iid.','.Input::get('roll');
             $address=Input::get('address');
             $guardian=Input::get('guardian_name');
             $gender=Input::get('gender');
             $religion=Input::get('religion');
             $email=Input::get('email');
             $phone=Input::get('phone');
             $class=Input::get('class');
             $section=Input::get('section');
             $roll=Input::get('roll');
             $user_type=Input::get('user_type');
             $transport_rent=Input::get('transport_rent');
             $birth_certificate=Input::get('birth_certificate');
             $image=Input::get('image');
             $route_name=Input::get('route_name');
             $status=Input::get('status');
    $user_name=Input::get('username');
    //return $password;
    //return $name.$studentid.$institute.$guardian.$gender.$religion.$email.$phone.$class.$section.$roll.$user_type.$transport_rent.$birth_certificate.$image
     //   .$route_name.$status;
            $u=new User;
            $u->name=$name;
            $u->uid=$uid;
            $u->priv=2;
            $u->user_type=Input::get('user_type');
            $u->user_name=$user_name;
            $u->email=$email;
            $u->password= Hash::make(Input::get('confirm_password'));
            $u->save();
    $su=new User;
    $su->name=$name;
    $su->st_id=$uid;
    $su->institute_code=$uid;
    $su->guardian_id=$uid;
    $su->guardian_name=$uid;
    $su->gender=$uid;
    $su->religion=$uid;
    $su->phone=$uid;
    $su->address=$uid;
    $su->class=$uid;
    $su->section=$uid;
    $su->roll=$uid;
    $su->image=$uid;
    $su->birth_certificate=$uid;
    $su->tran_route_name=$uid;
    $su->transport_rent=$uid;
    $su->priv='2';
    $su->user_type=Input::get('user_type');
    $su->user_name=$user_name;
    $su->email=$email;
    $su->password= Hash::make(Input::get('confirm_password'));
    $usu->save();
             Session::flash('saved',1);
             return Redirect::to('add/student');
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
        $userc = User::where('institute_id', '=', $icode)->orWhere('email', '=', $email)->count();
        $marchant = Institute::where('institute_code', '=', $icode)->orWhere('email', '=', $email)->count();
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
        $parentsinfo=Parents::all();
        return view('parent.reg_parent')->with('parents',$parentsinfo);
    }
public function postAddParents(){
    $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
    $gname=Input::get('gname');
    $fname=Input::get('father_name');
    $mname=Input::get('mother_name');
    $fprofession=Input::get('father_profession');
    $mprofession=Input::get('mother_profession');
    $religion=Input::get('religion');
    $address=Input::get('address');
    $email=Input::get('email');
    $phone=Input::get('phone');
    $national_id=Input::get('nid');
    $uname=Input::get('username');
    $uid=$iid.' '.mt_rand('1','9999');

    //return $uid;
    $pu=new User;
    $pu->name=$gname;
    $pu->uid=$uid;
    $pu->user_name=$uname;
    $pu->user_type='Parents';
    $pu->priv=4;
    $pu->email=$email;
    $pu->password=Hash::make(Input::get('confirm_password'));
    $pu->save();

    $pup=new  Parents;
    $pup->guardian_name=$gname;
    $pup->institute_code=$iid;
    $pup->guradian_id=$uid;
    $pup->fathers_name=$fname;
    $pup->mothers_name=$mname;
    $pup->fathers_profession=$fprofession;
    $pup->mothers_profession=$mprofession;
    $pup->phone=$phone;
    $pup->address=$address;
    $pup->national_id=$national_id;
    $pup->religion=$religion;
    $pup->user_name=$uname;
    $pup->user_type='Parents';
    $pup->priv=4;
    $pup->email=$email;
    $pup->password=Hash::make(Input::get('confirm_password'));
    $pup->save();
    Session::flash('data','Data successfully added !');
    return Redirect::to('admin/add/parents');
}
    public function getAddTeacher(){
        $teacherinfo=Teacher::all();
        //return $teacherinfo;
        return view('teacher.reg_teacher')->with('teacher', $teacherinfo);
    }
   public function postAddTeacher(){
        $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
        $name=Input::get('firstname').' '.Input::get('lastname');
        $designation=Input::get('designation');
        $dbirth=Input::get('dbirth');
        $gender=Input::get('gender');
        $religion=Input::get('religion');
        $address=Input::get('address');
        $national_id=Input::get('nid');
        $join_date=Input::get('join_date');
        $email=Input::get('email');
        $phone=Input::get('phone');
        $username=Input::get('username');
        $uid=$iid.' '.mt_rand('00000','99999');
//$i=Input::get('image');
        if(Input::hasFile('image')){
            //return 1;
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
        $tu=new User;
        $tu->name=$name;
        $tu->uid=$uid;
        $tu->user_name=$username;
        $tu->user_type='Teacher';
        $tu->priv=4;
        $tu->email=$email;
        $tu->password=Hash::make(Input::get('confirm_password'));
        $tu->save();
        $ut=new Teacher;
        $ut->institute_code=$iid;
        $ut->teacher_id=$uid;
        $ut->name=$name;
        $ut->designation=$designation;
        $ut->birth_date=$dbirth;
        $ut->gender=$gender;
        $ut->religion=$religion;
        $ut->email=$email;
        $ut->phone=$phone;
        $ut->address=$address;
        $ut->join_date=$join_date;
        $ut->national_id=$national_id;
        $ut->user_name=$username;
        $ut->image=$final;
        $ut->password=Hash::make(Input::get('confirm_password'));
        $ut->user_type='Teacher';
        $ut->save();
        Session::flash('data','Data successfully added !');
        return Redirect::to('admin/add/teacher');
    }
 
    public function getaddclass() {
        $classInfo = ClassAdd::all();
        $teacher = Teacher::all()->lists('teacher_id', 'name');
        return view('admin.ClassAdd')->with('teacher', $teacher)->with('classallinfo', $classInfo);
    }

    public function postaddclass() {
        //saif for admin
        $teacherId = Input::get('teacherName');
        $class = Input::get('className');
        $classNumaric = Input::get('classnumeric');
        $note = Input::get('ClassNote');
         $teacherName=  Teacher::where('teacher_id','=',$teacherId)->pluck('name');
        $cl = new ClassAdd;
        $cl->institute_code=Auth::user()->institute_id;
        $cl->class_name=$class;
        $cl->class_name_numaric=$classNumaric;
        $cl->teacher_id=$teacherId;
        $cl->teacher_name=$teacherName;
        $cl->note=$note;
        $cl->save();
         Session::flash('data', 'Data successfully added !');
        return Redirect::to('Addclass');
    }
 
    
    public function getsection(){
        ///saif for admin
         $teacher = Teacher::all()->lists('teacher_id', 'name');
         $class = ClassAdd::all()->lists('class_id', 'class_name');
        $section=Section::all();
        return view('admin.sectionadd')->with('section',$section)->with('teacher', $teacher)->with('allclass',$class);
    }
    public function postsection(){
        //saif for admin
        $teacherid= Input::get('teacherName');
        $classid=  Input::get('className');
        $sectionName=Input::get('SectionName');
        $sectionCategory=  Input::get('sectioncategory');
        $sectionNote=  Input::get('sectionNote');
        // return $classid;
        $teacherName= Teacher::where('teacher_id','=',$teacherid)->pluck('name');
        $className=  ClassAdd::where('class_id','=',$classid)->pluck('class_name');
        $sec=new Section;
        $sec->institute_code=Auth::user()->institute_id;
        $sec->section_name=$sectionName;
        $sec->section_category=$sectionCategory;
        $sec->class_id=$classid;
        $sec->class_name=$className;
        $sec->tearcher_id=$teacherid;
        $sec->tearcher_name=$teacherName;
        $sec->note=$sectionNote;        
        $sec->save();
        
        Session::flash('data', 'You successfully');
        return Redirect::to('sectionAdd');
        
    }
    public function viewinstuted($icode){
        //saif for admin
        //return $icode;
        $detailsinist=  Institute::where('institute_code','=',$icode)->first();
        return view('admin.instutedDetails')->with('detailinf',$detailsinist);
        
    }
    public function editinstutedinfo($incode){
        //saif for admin
        $detailsinist=  Institute::where('institute_code','=',$incode)->first();
        return view('admin.instutededit')->with('detailinf',$detailsinist);
        
    }
    public function editinstutedinfoupdate($iucode){
        //saif admin
            $name=  Input::get('institute_name');           
            $district = Input::get('district');
            $thana = Input::get('thana');          
            $email = Input::get('email');           
            $inphone = Input::get('phone');
            $inaddress = Input::get('address');
            $inurl = Input::get('url');
        $infoupdate=  Institute::where('institute_code','=',$iucode)->update(['institute_name'=>$name,'email'=>$email,'phone'=>$inphone,'address'=>$inaddress,'district'=>$district,'thana'=>$thana,'url'=>$inurl]);
        
        Session::flash('data', 'You successfully');
        return Redirect::to('institute/edit/'.$iucode);
        }

        public function deleteinstutedinfo($idcode){
            //saif for admin
            $infoDelete=  Institute::where('institute_code','=',$idcode)->delete();
             Session::flash('data', 'You successfully');
             return Redirect::to('admin/institute/registration');
        }
 
public  function getAddSubject(){
    $teacher = Teacher::all()->lists('teacher_id', 'name');
    $class = ClassAdd::all()->lists('class_id', 'class_name');
    $subinfo= Subject::all();
    return view('admin.addsubject')->with('teacher',$teacher)->with('class',$class)->with('allsubinfo',$subinfo);
}
 public function postAddSubject(){
     $teacher=Input::get('subteacher');
     $class=Input::get('subclass');
     //return $class;
     $teacher_name=Teacher::where('teacher_id','=',$teacher)->pluck('name');
     $class_name=ClassAdd::where('class_id','=',$class)->pluck('class_name');
     $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
     //return $iid;
     $subnote=new Subject;
     $subnote->institute_code=$iid;
     $subnote->subject_name=Input::get('subname');
     $subnote->subject_code=Input::get('subcode');
     $subnote->class_id=Input::get('subclass');
     $subnote->class_name=$class_name;
     $subnote->teacher_id=Input::get('subteacher');
     $subnote->teacher_name=$teacher_name;
     $subnote->sub_author=Input::get('subauth');

     $subnote->save();
     Session::flash('data', 'Data successfully added !');
     return Redirect::to('admin/add/subject');

 }
 
       
 
}

function priv() {
    return Auth::user()->priv;
}
