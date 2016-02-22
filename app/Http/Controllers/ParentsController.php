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

class ParentsController extends Controller
{
public function getDetailsParents($id){
    //Moin
    //Parents Detail get Function for admin
    $getparents=Parents::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=',$id)->first();
    return view('parent.parentsdetail',['individualParents'=>$getparents]);
}
    public function getEditParents($id){
        //Moin
        //Parents Edit get Function for admin
        $icode= User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        $editparents=Parents::where('institute_code','=',Auth::user()->institute_id)->where('guradian_id','=',$id)->first();
        //return $editteacher;
        return view('parent.editparents',['parentsedit'=>$editparents,'icode'=>$icode]);
    }
    public function updateParentsEdit($id){
        //Moin
        //Parents Update Function for admin

        $guardian_name=Input::get('guardian_name');
        $fathers_name=Input::get('fathers_name');
        $mothers_name=Input::get('mothers_name');
        $fathers_profession=Input::get('fathers_profession');
        $mothers_profession=Input::get('mothers_profession');
        $religion=Input::get('religion');
        $email=Input::get('email');
        $phone=Input::get('phone');
        $address=Input::get('address');
        $national_id=Input::get('national_id');
        $userc=User::where('uid','=',$id)->where('email','=',$email)->count();
        $marchant=Parents::where('guradian_id','=',$id)->where('email','=',$email)->count();
        if($userc >0 && $marchant>0){
            $parentsupdate = Parents::where('institute_code', '=', Auth::user()->institute_id)->where('guradian_id', '=', $id)
                ->update(['guardian_name' => $guardian_name,
                    'fathers_name' => $fathers_name,
                    'mothers_name' => $mothers_name,
                    'fathers_profession' => $fathers_profession,
                    'mothers_profession' => $mothers_profession,
                    'religion' => $religion,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'national_id' => $national_id
                ]);
            $user = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $id)
                ->update(['name' => $guardian_name,'email' => $email]);
            Session::flash('data', 'Data successfully added !');
            return Redirect::to('/parents/edit/' .$id);
        }else{
            $userc=User::where('email','=',$email)->count();
            $marchant=Parents::where('email','=',$email)->count();
            if($userc >0 && $marchant>0){
                Session::flash('data', 'Email Already Used !');
                return Redirect::to('/parents/edit/' .$id);
            }
            else{
                $parentsupdate = Parents::where('institute_code', '=', Auth::user()->institute_id)->where('guradian_id', '=', $id)
                    ->update(['guardian_name' => $guardian_name,
                        'fathers_name' => $fathers_name,
                        'mothers_name' => $mothers_name,
                        'fathers_profession' => $fathers_profession,
                        'mothers_profession' => $mothers_profession,
                        'religion' => $religion,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                        'national_id' => $national_id
                    ]);
                $user = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $id)
                    ->update(['name' => $guardian_name,'email' => $email]);
                Session::flash('data', 'Data successfully added !');
                return Redirect::to('/parents/edit/' .$id);
            }
        }

    }

    public function deleteParentsInfo($uid){
        //Moin
        //Parents Delete Function for admin

        $infoDelete = Parents::where('institute_code', '=', Auth::user()->institute_id)->where('guradian_id', '=', $uid)->delete();
        $infoDelete = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $uid)->delete();
        Session::flash('data', 'Data successfully deleted !');
        return Redirect::to('/admin/add/parents');
    }
}
