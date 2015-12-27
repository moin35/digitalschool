<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    if(Auth::check()){
        if(priv()==1){
            return view('superadmin.add_search_student');
        }
        else{
            Session::flash('data','Not Logged In! Please Login to Continue.');
            return redirect::to('/');
        }
    }else{
        Session::flash('data','Not Logged In! Please Login to Continue.');
        return redirect::to('/');
    }

}
public function postAddStudent(){
    if(Auth::check()){
         if(priv()==1){

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
