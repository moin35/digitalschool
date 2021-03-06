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
use App\Expance;
class AccountsController extends Controller
{

    public function find(Route $route){
        $this->genre = AccountFeeType::find($route->getParameter('fee/type/edit'));
    }
    public function getAccountType(Request $request)
    {
      //return 1;
        if ($request->ajax()) {
            $feetyp = AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->get();
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

        $allinvoice=Invoice::where('institute_code', '=', Auth::user()->institute_id)->get();

        return view('admin.invoice.addinvoice',['classview'=>$classname,'feetype'=>$fee,'allinvoice'=>$allinvoice]);
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
            $answer=$data['answer'];
//return $answer;
            $studentid=Students::where('institute_code','=',Auth::user()->institute_id)->where('name','=',$std)->where('class','=',$cls)->pluck('st_id');
            //return $studentid;
            $classname=ClassAdd::where('institute_code','=',Auth::user()->institute_id)->where('class_id','=',$cls)->pluck('class_name');
            $feetype=AccountFeeType::where('institute_code','=',Auth::user()->institute_id)->where('fee_id','=',$fee)->pluck('fee_type');
         //return $feetype;
            $price = DB::table('tbl_ac_invoice_create')->where('institute_code','=',Auth::user()->institute_id)->max('invoice_id');
            $price++;
            $iid=Auth::user()->institute_id;
            $s=new Invoice;
            $s->class_id=$cls;
            $s->class_name=$classname;
            $s->invoice_id=$price;
            $s->student_name=$std;
            $s->student_id=$studentid;
            $s->fee_id=$fee;
            $s->fee_type=$feetype;
            $s->total_amount=$amn;
            $s->payment_ammount=$paidamount;
            $s->section_id=$sec;
            $s->date=$date;
            $s->institute_code=$iid;
            $s->due_amount=$answer;
            $s->status=0;
            $s->save();

            //return $insertedId;
            return response()->json([
                "message" => "created"
            ]);
        }
    }
    public function editInvoice($id)
    {
        $classname=ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id','class_name');
        $fee=AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->lists('fee_id','fee_type');

        //$allinvoice=Invoice::where('institute_code', '=', Auth::user()->institute_id)->get();
        //return $allinvoice;
      $invoice=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->first();
        return view('admin.invoice.invoiceedit',['classview'=>$classname,'feetype'=>$fee,'voucher'=>$invoice]);
    }

    public function updateInvoice($id){
            $class=Input::get('class');
            $section=Input::get('section');
            $student=Input::get('student');
            $feetype=Input::get('feetype');
            $amount=Input::get('amount');
            $paidamountid=Input::get('paid');
            $answer=Input::get('answer');
            $date=Input::get('date');
        //return $paidamountid;
        $studentid=Students::where('institute_code','=',Auth::user()->institute_id)->where('name','=',$student)->where('class','=',$class)->pluck('st_id');
        return $studentid;
        $classname=ClassAdd::where('institute_code','=',Auth::user()->institute_id)->where('class_id','=',$class)->pluck('class_name');
        $feetypename=AccountFeeType::where('institute_code','=',Auth::user()->institute_id)->where('fee_id','=',$feetype)->pluck('fee_type');
        $up=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)
            ->update(['class_id'=>$class,
                      'class_name'=>$classname,
                        'section_id'=>$section,
                        'student_name'=>$student,
                        'student_id'=>$studentid,
                        'fee_type'=>$feetypename,
                        'fee_id'=>$feetype,
                        'total_amount'=>$amount,
                        'payment_ammount'=>$paidamountid,
                        'due_amount'=>$answer,
                        'date'=>$date,
                        ]);
        Session::flash('data', 'Success!');
        return redirect::to('admin/edit/invoice/'.$id);
    }

    public function deleteInvoice($id){
        $delete=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->delete();
        Session::flash('data', 'Data successfully deleted !');
        return redirect::to('admin/add/invoice');
    }
public function viewInvoice($id){

    $printview=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->first();
    $institute=Institute::where('institute_code','=',Auth::user()->institute_id)->first();
    //return $printview;
        return view('admin.invoice.viewinvoice',['print'=>$printview,'iis'=>$institute]);
}
    public function printInvoice($id){
        //return 'OK';
        $printview=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->first();
        $institute=Institute::where('institute_code','=',Auth::user()->institute_id)->first();
        //return $printview;
        return view('admin.invoice.printinvoice',['print'=>$printview,'iis'=>$institute]);
    }
   public function viewBalance(){

       $classname=ClassAdd::where('institute_code','=',Auth::user()->institute_id)->lists('class_id','class_name');
       $balance=Invoice::where('institute_code','=',Auth::user()->institute_id)
                           ->select('student_name','class_id','class_name')
                            ->distinct()
                            ->get();

//return $balance;
       return view('admin.balance',['balance'=>$balance,'class'=>$classname]);
   }


    public function getExpense()
    {
      # saif acount moodule Expense
      $allViews=Expance::where('institute_code','=',Auth::user()->institute_id)->get();
    $ExpanceSum=Expance::where('institute_code','=',Auth::user()->institute_id)->sum('amount');
      //return $ExpanceSum;
      return view('admin.invoice.Expenses')->with('allresultViews',$allViews)->with('totalExpance',$ExpanceSum);
    }

    public function postExpense(Request $request){
      if($request->ajax()){
          $data=Input::all();

         $eName=$data['expensesName'];
         $eDate=$data['edateid'];
         $eAmount=$data['amountid'];
         $eNote=$data['enote'];
        $iid=Auth::user()->institute_id;
        $user=Auth::user()->user_name;
        //  return $eAmount;
          $edata=new Expance;
          $edata->institute_code=$iid;
          $edata->name=$eName;
          $edata->users=$user;
          $edata->date=$eDate;
          $edata->amount=$eAmount;
          $edata->note=$eNote;
          $edata->action=0;
          $edata->save();
          return response()->json(["message" => "created"]);

        }

    }
public function individualBalance($name){
    $printview=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->first();
    $paidtotal=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('payment_ammount');
    $duetotal=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('due_amount');
    $totalamount=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('total_amount');
   //return $duetotal;
    $institute=Institute::where('institute_code','=',Auth::user()->institute_id)->first();
    $balance=Invoice::where('institute_code','=',Auth::user()->institute_id)
        ->where('student_name','=',$name)
        ->get();
//return $balance;
    return view('admin.individualbalance',['balance'=>$balance,'print'=>$printview,'iis'=>$institute,'paid'=>$paidtotal,'due'=>$duetotal,'total'=>$totalamount]);
}
    public function individualReportPrint($name){
        $printview=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->first();
        $paidtotal=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('payment_ammount');
        $duetotal=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('due_amount');
        $totalamount=Invoice::where('institute_code','=',Auth::user()->institute_id)->where('student_name','=',$name)->sum('total_amount');
        //return $duetotal;
        $institute=Institute::where('institute_code','=',Auth::user()->institute_id)->first();
        $balance=Invoice::where('institute_code','=',Auth::user()->institute_id)
            ->where('student_name','=',$name)
            ->get();
//return $balance;
        return view('admin.individualreportprint',['balance'=>$balance,'print'=>$printview,'iis'=>$institute,'paid'=>$paidtotal,'due'=>$duetotal,'total'=>$totalamount]);
    }



        public function editExpense($id){
          //return $id;
          $editExpense=Expance::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->first();
          //return $editExpense;
          return view('admin.invoice.editExpenses')->with('editExpense',$editExpense);
        }
        public function updateExpense($id){

                  $eName=Input::get('expensesName');
                  $eDate=Input::get('edateid');
                  $eAmount=Input::get('amountid');
                  $eNote=Input::get('enote');
                   //$eName=$data['expensesName'];
                   //$eDate=$data['edateid'];
                   //$eAmount=$data['amountid'];
                   //$eNote=$data['enote'];
                  // $id=$data['id'];
                  $iid=Auth::user()->institute_id;
                  $user=Auth::user()->user_name;
                  $UpdateExpense=Expance::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)
                  ->update(['name'=>$eName,'date'=>$eDate,'amount'=>$eAmount,'note'=>$eNote]);
                    Session::flash('data', 'Data successfully  Update !');
                  return redirect()->back();

        }
        public function deleteExpense($id){
             $DeleteExpense=Expance::where('institute_code','=',Auth::user()->institute_id)->where('id','=',$id)->delete();
             Session::flash('data', 'Data successfully  Delete !');
            return redirect()->back();
        }
public function getReport(){
    return view('admin.schoolreport');
}
    }

