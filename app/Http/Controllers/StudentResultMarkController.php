<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Mark;
use App\Exam;
use App\ClassAdd;
use App\Staff;
use Illuminate\Support\Facades\DB;
use App\Students;
use App\GradeSystem;


class StudentResultMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private function getallclass(){

        $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');

        return $class;
        }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


          public function markIndex(){

          $this->getallclass();
        //  $allStudetResult=Mark::where('institute_code', '=', Auth::user()->institute_id)->groupBy('student_id')->distinct()->get(['class_name']);
            $allStudetResult=Mark::where('institute_code', '=', Auth::user()->institute_id)->select('image','phone','student_name','class_name','roll','section','class_id')->distinct()->get();
         //return  $allStudetResult;
          return view('admin.resultMark.markindex')->with('allclass', $this->getallclass())->with('allStudetResult',$allStudetResult);
          }

          public function markadd(){
          //saif markIndex view for admin and teacher

          $class=Input::get('classid');
          $examNameviews=Input::get('examName');
          $subJNames=Input::get('subject');
          $sectionName=Input::get('section');
          $examName=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id', 'exam_name');
          $allclass = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');

          $markForStdSub1=Mark::where('class_id','=',$class)->where('exam_name','=',$examNameviews)->where('exam_subject','=',$subJNames)->get();

          $markForStdSub=Mark::where('institute_code','=', Auth::user()->institute_id)->where('class_id','=',$class)->where('exam_name','=',$examNameviews)->where('exam_subject','=',$subJNames)->get();

          return view('admin.resultMark.markadd')->with('allclass', $allclass)->with('examName',$examName)->with('addmake',$markForStdSub)->with('examNameviews',$examNameviews)->with('subJNames',$subJNames)->with('classId',$class)
          ->with('markForStdSub1',$markForStdSub1)->with('section',$sectionName);
          }

          public function postAddMark(){

          $class=Input::get('classid');
          $examNameviews=Input::get('examName');
          $subJNames=Input::get('subject');
          $sectionName=Input::get('section');
          $examName=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id', 'exam_name');
          $allclass = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
          $markForStdSub1=Mark::where('class_id','=',$class)->where('exam_name','=',$examNameviews)->where('exam_subject','=',$subJNames)->get();
          $markForStdSub = DB::table('tbl_studets')
          ->join('tbl_class','tbl_studets.class','=','tbl_class.class_id')
          ->select('tbl_studets.*','tbl_class.*')
          ->where('tbl_class.institute_code','=',Auth::user()->institute_id)
          ->where('tbl_studets.institute_code','=',Auth::user()->institute_id)
          ->where('tbl_studets.class','=',$class)
          ->get();

          return view('admin.resultMark.markadd')->with('allclass', $allclass)->with('examName',$examName)->with('addmake',$markForStdSub)
          ->with('examNameviews',$examNameviews)->with('subJNames',$subJNames)->with('classId',$class)
          ->with('markForStdSub1',$markForStdSub1)->with('section',$sectionName);


          }
          public function postAddMarkall(){
        //saif for admin or inst mark add 1/25/16


        $clsassid=Input::get('classId');
        $className=Input::get('ClassName');
        $markExamName=Input::get('examName');
        $markSubj=Input::get('subjName');
        $std_id=Input::get('stdId');
        $stdRoll=Input::get('stdRoll');
        $std_name=Input::get('stdName');
        $std_phone=Input::get('stdphone');
        $std_image=Input::get('stdImage');
        $mark=Input::get('mark');
        $sectionName=Input::get('sectionName');

        $icode=Auth::user()->institute_id;
        $data = Input::all();
       //return $sectionName;

        if($data!=" "){
        $data = Input::all();
        $clsassid=$data['classId'];
        $className=$data['ClassName'];
        $markExamName=$data['examName'];
        $markSubj=$data['subjName'];
        $std_id=$data['stdId'];
        $stdRoll=$data['stdRoll'];
        $std_name=$data['stdName'];
        $std_phone=$data['stdphone'];
        $std_image=$data['stdImage'];
        $mark=$data['mark'];
        $sectionName=$data['sectionName'];
        $icode=$data['iid'];
      //  return $icode;
        for($a=0;$a<count($clsassid);$a++)
        {
        //return $clsassid;
        $markchecktest=Mark::where('exam_name','=',$markExamName[$a])->where('exam_subject','=',$markSubj[$a])->where('class_id','=',$clsassid[$a])->get();
        $markcheck=Mark::where('exam_name','=',$markExamName[$a])->where('exam_subject','=',$markSubj[$a])->where('class_id','=',$clsassid[$a])->count();

        //return $markcheck;
        if ($markcheck!=0) {

        for($a=0;$a<count($clsassid);$a++){
        $updateMark[]=Mark::where('class_id','=',$clsassid[$a])->where('exam_subject','=',$markSubj[$a])->where('exam_name','=',$markExamName[$a])
        ->where('student_id','=',$std_id[$a])->where('section','=',$sectionName[$a])->update(array('sub_mark'=>$mark[$a]));
        }
        }
        else {
        for($a=0;$a<count($clsassid);$a++){

        $addmark=new Mark;
        $addmark->institute_code=$icode[$a];
        $addmark->exam_subject=$markSubj[$a];
        $addmark->student_id=$std_id[$a];
        $addmark->section=$sectionName[$a];
        $addmark->student_name=$std_name[$a];
        $addmark->class_id=$clsassid[$a];
        $addmark->class_name=$className[$a];
        $addmark->phone=$std_phone[$a];
        $addmark->roll=$stdRoll[$a];
        $addmark->image=$std_image[$a];
        $addmark->exam_name=$markExamName[$a];
        $addmark->sub_mark=$mark[$a];
        $addmark->save();
        }


        }
        }
        return redirect()->back()->withInput();

        }
        else {
      //  return 2;
        redirect()->back();
        }

        }

        public function getMarkViews($roll,$cid){
        $stdInfo=Students::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class','=',$cid)->first();
        $stdClass=ClassAdd::where('class_id','=',$stdInfo->class)->pluck('class_name');
        $showAllMark=Mark::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class_id','=',$cid)->get();
      //$showAllMarkExamName=Mark::where('institute_code', '=', Auth::user()->institute_id)->select('id','exam_subject','exam_name','sub_mark')->distinct()->get();
        $showAllMarkExamName=Mark::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class_id','=',$cid)->get();
        $MarkViewGrade=Mark::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class_id','=',$cid)->first();
        //return $showAllMark->sub_mark;
        $allGrad=GradeSystem::where('institute_code','=',Auth::user()->institute_id)->get();
        $MarkViewGrade=Mark::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class_id','=',$cid)->get();

      /*  foreach ($allGrad as $key => $value) {
         //return $MarkViewGrade->sub_mark;
         $MarkViewGrade=Mark::where('institute_code','=',Auth::user()->institute_id)->where('roll','=', $roll)->where('class_id','=',$cid)->get();

         //return $MarkViewGrade;
         foreach ($MarkViewGrade as $key => $markget) {
    //  return $value->mark_form;
           if ($markget->sub_mark>=$value->mark_form && $markget->sub_mark<=$value->mark_upto) {

            $point=$value->grade_point ;
            $grade=$value->grade_name ;
            return view('admin.resultMark.markviews')->with('stdInfo',$stdInfo)->with('stdClass',$stdClass)
            ->with('showAllMark',$showAllMark)->with('MarkViewGrade',$MarkViewGrade)->with('allGrad',$allGrad)->with('point',$point)->with('grade',$grade);

           }

           else {
             return 2 ;
           }
         }



       }*/
        //  return $point.$grade;

        return view('admin.resultMark.markviews')->with('stdInfo',$stdInfo)->with('stdClass',$stdClass)
        ->with('showAllMark',$showAllMark)->with('MarkViewGrade',$MarkViewGrade)->with('allGrad',$allGrad)->with('showAllMarkExamName',$showAllMarkExamName);
        }

}
