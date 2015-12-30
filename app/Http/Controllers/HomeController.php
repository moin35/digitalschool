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
use Illuminate\Support\Facades\Hash;
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
            $u->priv='2';
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
        return view('admin.reg_insiatute');
    }
    public function postInstituteReg(){
        $insiatute=Input::get('iname');
        $email=Input::get('email');
        $einn=Input::get('einn');
       // return $insiatute.'/'.$email.'/'. $einn;
        $iu=new Institute;
        $iu->institute_name=$insiatute;
        $iu->email=$email;
        $iu->institute_code=$einn;
        $iu->save();
    }
    public function getAddParents(){
        return view('parent.reg_parent');
    }
}
function priv(){
    return  Auth::user()->priv;
}
