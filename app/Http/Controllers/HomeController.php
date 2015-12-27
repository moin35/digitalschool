<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    if(Auth::check()){
         if(priv()==1){
            $name=Input::get('name');
             $student_id=Input::get('st_id');
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



         }
        else{

        }
    }else{

    }
}
}
function priv(){
    return  Auth::user()->priv;
}
