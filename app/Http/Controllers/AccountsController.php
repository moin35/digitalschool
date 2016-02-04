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
        //$feeall=AccountFeeType::where('institute_code','=',Auth::user()->institute_id)->get();
        return view('admin.add_fee_type');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postAccountType(Request $request)
    {
        if($request->ajax()){
            $data=Input::all();
            $type=$data['feetype'];
            $note=$data['note'];
            $iid=Auth::user()->institute_id;
            //return $iid;
            //return $type;
            $s=new AccountFeeType;
            $s->ac_id=mt_rand('100', '9999').$iid;
            $s->fee_type=$type;
            $s->fee_id='fee'.mt_rand('100', '9999');
            $s->note=$note;
            $s->institute_code=$iid;
            $s->save();
           // return $type;
           // AccountFeeType::create($request->all());
            return response()->json([
                "message" => "created"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditFeeType($id)
    {
       //return $id;
        $this->free=AccountFeeType::find($id);
      // $feetyp = AccountFeeType::where('id','=',$id)->first();
        return response()->json($this->free);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdateFeeType(Request $request, $id)
    {
        //return $id;
        if($request->ajax()) {
            $data=Input::all();
            $fee_type=$data['moin'];
            $note=$data['saif'];
            //return $fee_type;
            //$this->free = AccountFeeType::find($id);
            //return $this->free['fee_type'];

            $up = AccountFeeType::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=', $id)
                ->update(['fee_type' => $fee_type, 'note' => $note]);
            //$this->free->fill($request->all());
            //$this->free->save();
            return response()->json(["message" => "clever"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeleteFeeType($id)
    {
        $this->free=AccountFeeType::find($id);
        $this->free->delete();
        return response()->json(["mensaje"=>"borrado"]);
    }
}
