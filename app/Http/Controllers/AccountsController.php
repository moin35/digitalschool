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
    public  function  getInvoice(Request $request){
        $classname=ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id','class_name');
        $fee=AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->lists('fee_id','fee_type');
        if ($request->ajax()) {
            $invoice = Invoice::all();
            return response()->json($invoice);
        }
        return view('admin.invoice.addinvoice',['classview'=>$classname,'feetype'=>$fee]);
    }
    public function postInvoice(Request $request)
    {
        if($request->ajax()){
            $data=Input::all();
            $cls=$data['class'];
            $sec=$data['section'];
            $std=$data['student'];
            $fee=$data['feetype'];
            $amn=$data['amount'];
            $paidamount=$data['paid'];
           // $dueamount=$data['due'];
            $date=$data['date'];

            $classname=ClassAdd::where('institute_code','=',Auth::user()->institute_id)->where('class_id','=',$cls)->pluck('class_name');
            $feetype=AccountFeeType::where('institute_code','=',Auth::user()->institute_id)->where('fee_id','=',$fee)->pluck('fee_type');
         //return $feetype;
            $iid=Auth::user()->institute_id;
            $s=new Invoice;
            $s->class_id=$cls;
            $s->class_name=$classname;
            $s->invoice_id=$iid.' '.mt_rand('1', '9999');
            $s->student_name=$std;
            $s->fee_id=$fee;
            $s->fee_type=$feetype;
            $s->total_amount=$amn;
            $s->payment_ammount=$paidamount;
            $s->section_id=$sec;
            $s->date=$date;
            $s->institute_code=$iid;
            $s->status=0;
            $s->save();
            return response()->json([
                "message" => "created"
            ]);
        }
    }


}
