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

class TeachersController extends Controller
{
public function getDetailsTeacher($id){
    //Moin
    //Teacher's Detail get Function for admin
    $getteacher=Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=',$id)->first();
    return view('teacher.teacherdetail',['individualTeacher'=>$getteacher]);
}
    public function getTeacherEdit($id){
        //Moin
        //Teacher's Edit get Function for admin
        $icode= User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        $editteacher=Teacher::where('institute_code','=',Auth::user()->institute_id)->where('teacher_id','=',$id)->first();
        //return $editteacher;
        return view('teacher.editteachers',['teacheredit'=>$editteacher,'icode'=>$icode]);
    }
    public function updateTeacherEdit($id){
        //Moin
        //Student Update Function for admin
        $name=Input::get('name');
        $designation=Input::get('designation');
        $dbirth=Input::get('birth_date');
        $gender=Input::get('gender');
        $religion=Input::get('religion');

        $join_date=Input::get('join_date');

        $email=Input::get('email');
        $phone=Input::get('phone');
        $address=Input::get('address');
        $national_id=Input::get('national_id');

        //return $final;
        //return $name.'/'.$roll.'/'.$designation.'/'.$dbirth.'/'.$gender.'/'.$religion.'/'.$join_date.'/'.$email.'/'.$phone.'/'.$address.'/'.$final;
        $userc=User::where('uid','=',$id)->where('email','=',$email)->count();
        $marchant=Teacher::where('teacher_id','=',$id)->where('email','=',$email)->count();
        if($userc >0 && $marchant>0){
            if (Input::hasFile('image')) {

                $extension = Input::file('image')->getClientOriginalExtension();
                if($extension=='png'||$extension=='jpg'||$extension=='jpeg'||$extension=='bmp'||
                    $extension=='PNG'||$extension=='jpg'||$extension=='JPEG'||$extension=='BMP'){
                    $date=date('dmyhsu');
                    $fname=mt_rand('199', '999').'.'.$extension;
                    $destinationPath = 'images/';
                    Input::file('image')->move($destinationPath,$fname);
                    $final=$fname;

                    $re1 = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)->update(['image' => $final]);
                }
                else {
                    $re = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)->update(['image' => '']);
                }
            }
            $teacherupdate = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)
                ->update(['name' => $name,
                    'designation' => $designation,
                    'birth_date' => $dbirth,
                    'gender' => $gender,
                    'religion' => $religion,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'join_date' => $join_date,
                    'national_id' => $national_id

                ]);
            $user = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $id)
                ->update(['name' => $name,'email' => $email]);
            Session::flash('data', 'Data successfully added !');
            return Redirect::to('/teachers/edit/' .$id);
        }
        else{
            $userc=User::where('email','=',$email)->count();
            $marchant=Teacher::where('email','=',$email)->count();
            if($userc >0 && $marchant>0){
                Session::flash('data', 'Email Already Used !');
                return Redirect::to('/teachers/edit/' .$id);
            }

            else{
                if (Input::hasFile('image')) {

                    $extension = Input::file('image')->getClientOriginalExtension();
                    if($extension=='png'||$extension=='jpg'||$extension=='jpeg'||$extension=='bmp'||
                        $extension=='PNG'||$extension=='jpg'||$extension=='JPEG'||$extension=='BMP'){
                        $date=date('dmyhsu');
                        $fname=mt_rand('199', '999').'.'.$extension;
                        $destinationPath = 'images/';
                        Input::file('image')->move($destinationPath,$fname);
                        $final=$fname;

                        $re1 = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)->update(['image' => $final]);
                    }
                    else {
                        $re = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)->update(['image' => '']);
                    }
                }
                $teacherupdate = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $id)
                    ->update(['name' => $name,
                        'designation' => $designation,
                        'birth_date' => $dbirth,
                        'gender' => $gender,
                        'religion' => $religion,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                        'join_date' => $join_date,
                        'national_id' => $national_id

                    ]);
                $user = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $id)
                    ->update(['name' => $name,'email' => $email]);
                Session::flash('data', 'Data successfully added !');
                return Redirect::to('/teachers/edit/' .$id);
            }
        }


    }
    public function deleteTeachersInfo($uid) {
        //Moin
        //Student Delete Function for admin

        $infoDelete = Teacher::where('institute_code', '=', Auth::user()->institute_id)->where('teacher_id', '=', $uid)->delete();
        $infoDelete = User::where('institute_id', '=', Auth::user()->institute_id)->where('uid', '=', $uid)->delete();
        Session::flash('data', 'Data successfully deleted !');
        return Redirect::to('/admin/add/teacher');
    }
}
