<?php

namespace App\Http\Controllers;
use App\Mark;
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
use Illuminate\Routing\Route;
use App\AccountFeeType;
use App\Invoice;
class AccountsController extends Controller
{

    public function find(Route $route){
        $this->genre = AccountFeeType::find($route->getParameter('fee/type/edit'));
    }
    public function getAccountType(Request $request)
    {
        if ($request->ajax()) {
            $feetyp = AccountFeeType::all();
            return response()->json($feetyp);
        }
        return view('admin.add_fee_type');
    }
    public function postAccountType(Request $request)
    {
        if($request->ajax()){
            $data=Input::all();
            $type=$data['feetype'];
            $note=$data['note'];
            $iid=Auth::user()->institute_id;
            $s=new AccountFeeType;
            $s->ac_id=mt_rand('100', '9999').$iid;
            $s->fee_type=$type;
            $s->fee_id='fee'.mt_rand('100', '9999');
            $s->note=$note;
            $s->institute_code=$iid;
            $s->save();
            return response()->json([
                "message" => "created"
            ]);
        }
    }

    public function getEditFeeType($id)
    {

        $this->free=AccountFeeType::find($id);
        return response()->json($this->free);
    }


    public function getUpdateFeeType(Request $request, $id)
    {
        if($request->ajax()) {
            $data=Input::all();
            $fee_type=$data['moin'];
            $note=$data['saif'];
            $up = AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=', $id)
                ->update(['fee_type' => $fee_type, 'note' => $note]);
            return response()->json(["message" => "clever"]);
        }
    }

    public function getDeleteFeeType($id)
    {
        $this->free=AccountFeeType::find($id);
        $this->free->delete();
        return response()->json(["mensaje"=>"borrado"]);
    }
    public  function  getInvoice(){
        $classname=ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id','class_name');
        $fee=AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->lists('fee_id','fee_type');
        return view('admin.invoice.addinvoice',['classview'=>$classname,'feetype'=>$fee]);
    }
    public function postInvoice(Request $request)
    {
        if($request->ajax()){
            $data=Input::all();
         return $data;
            $iid=Auth::user()->institute_id;
            $s=new AccountFeeType;
            $s->ac_id=mt_rand('100', '9999').$iid;
            $s->fee_type=$type;
            $s->fee_id='fee'.mt_rand('100', '9999');
            $s->note=$note;
            $s->institute_code=$iid;
            $s->save();
            return response()->json([
                "message" => "created"
            ]);
        }
    }


}
