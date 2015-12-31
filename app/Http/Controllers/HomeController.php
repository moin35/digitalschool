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
use App\Parents;
use App\Teacher;
 

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function home(){
        if(Auth::check()){
            if(priv()==1){
                return view('welcome');
            }else{
                Session::flash('data','Not Logged In! Please Login to Continue.');
                return redirect::to('/');
            }
        }else{
            Session::flash('data','Not Logged In! Please Login to Continue.');
            return redirect::to('/');
        }

    }
public function getAddStudent(){
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
       
        $division=Division::all()->lists('id','Division');
      return view('admin.reg_insiatute')->with('divisionlist',$division);
    }
    public function postInstituteReg(){
         $email=Input::get('email');
        $icode=Input::get('icode');
    $userc=User::where('institute_id','=',$icode)->orWhere('email','=',$email)->count();        
    $marchant=  Institute::where('institute_code','=',$icode)->orWhere('email','=',$email)->count();
        if($userc >0 || $marchant>0){
            Session::flash('data','Institute or Email was already used. Please Try a different number.');

            return Redirect::to('merchant/signup');
      }
 else {
         $division=Input::get('division');
        $district=Input::get('district');
        $thana=Input::get('thana');        
        $insiatutename=Input::get('institute_name');
        $email=Input::get('email');
        $icode=Input::get('icode');
        $inphone=Input::get('iphone');
        $inaddress=Input::get('iaddress');
        $inurl=Input::get('inurl');
        $inpass=  Input::get('password');
        $cofpass=  Input::get('confirm_password');        
        
     // return $division.'/'.$district.'/'. $thana.'/'.$insiatute;
      
        $iu=new Institute;
        $iu->institute_name=$insiatutename;
        $iu->email=$email;
        $iu->institute_code=$icode;
        $iu->phone=$inphone;
        $iu->address=$inaddress;
        $iu->division=$division;
        $iu->district=$district;
        $iu->thana=$thana;
        $iu->url=$inurl;
        $iu->status=1;
        $iu->save();
        
        $uin=new User;
        $uin->name=$insiatutename;
        $uin->institute_id=$icode;
        $uin->uid=$icode;
        $uin->user_name=$inurl;
        $uin->user_type='Institute';
        $uin->priv=3;
        $uin->email=$email;
        $uin->password= $cofpass;
        $uin->save();
        
        
        $info=new InstituteInfo;
        $info->institute_code=$icode;
        $info->save();

        $incon=new InstituteContacts;
        $incon->institute_code=$icode;
        $incon->save();

        Session::flash('data','Data successfully added !');
      return Redirect::to('admin/institute/registration'); 
      }
        
    }

    public function getAddParents(){
        return view('parent.reg_parent');
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
        return view('teacher.reg_teacher');
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
}
function priv(){
    return  Auth::user()->priv;
}
