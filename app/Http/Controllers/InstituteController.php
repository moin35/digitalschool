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
use App\Exam;
use App\ExamSchedule;
use App\GradeSystem;

class InstituteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private function getallclass(){

         $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');

         return $class;
     }
    public function getaddclass() {
        //class info add institute //saif for admin and insti
        $classInfo = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->get();
        $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        return view('admin.ClassAdd')->with('teacher', $teacher)->with('classallinfo', $classInfo);
    }

    public function postaddclass() {
        //class info post institute //saif for admin and insti
        $teacherId = Input::get('teacherName');
        $class = Input::get('className');
        $classNumaric = Input::get('classnumeric');
        $note = Input::get('ClassNote');
        $teacherName = Teacher::where('teacher_id', '=', $teacherId)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');
        $cl = new ClassAdd;
        $cl->institute_code = Auth::user()->institute_id;
        $cl->class_name = $class;
        $cl->class_name_numaric = $classNumaric;
        $cl->teacher_id = $teacherId;
        $cl->teacher_name = $teacherName;
        $cl->note = $note;
        $cl->save();
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('Addclass');
    }

    public function geteditclass($clid) {
        //class info edit institute //saif for admin and insti
        $teacherlist = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $classupdate = ClassAdd::where('class_id', '=', $clid)->where('institute_code', '=', Auth::user()->institute_id)->first();

        return view('admin.classupdate')->with('classupdate', $classupdate)->with('teacher', $teacherlist);
    }

    public function postupdateclass($clsid) {
        //class info update institute //saif for admin and insti

        $clname = Input::get('classname');
        $clteachername = Input::get('teachername');
        $clnumaric = Input::get('classnumaric');
        $clnote = Input::get('ClassNote');
        $classupdate = ClassAdd::where('class_id', '=', $clsid)->where('institute_code', '=', Auth::user()->institute_id)->update(['class_name' => $clname, 'class_name_numaric' => $clnumaric, 'teacher_name' => $clteachername, 'note' => $clnote]);
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('class/edit/' . $clsid);
    }

    public function deleteclass($clsid) {
        //class info delete institute //saif for admin and insti
        $classupdate = ClassAdd::where('class_id', '=', $clsid)->where('institute_code', '=', Auth::user()->institute_id)->delete();
        Session::flash('data', 'Data successfully Delete !');
        return Redirect::to('Addclass');
    }

    public function getsection() {
        //Section info add institute //saif for admin and insti
        $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
        $section = Section::where('institute_code', '=', Auth::user()->institute_id)->get();
        return view('admin.sectionadd')->with('section', $section)->with('teacher', $teacher)->with('allclass', $class);
    }

    public function postsection() {
        //Section info post institute //saif for admin and insti
        $teacherid = Input::get('teacherName');
        $classid = Input::get('className');
        $sectionName = Input::get('SectionName');
        $sectionCategory = Input::get('sectioncategory');
        $sectionNote = Input::get('sectionNote');
        // return $classid;
        $teacherName = Teacher::where('teacher_id', '=', $teacherid)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');
        $className = ClassAdd::where('class_id', '=', $classid)->where('institute_code', '=', Auth::user()->institute_id)->pluck('class_name');
        $sec = new Section;
        $sec->institute_code = Auth::user()->institute_id;
        $sec->section_name = $sectionName;
        $sec->section_category = $sectionCategory;
        $sec->class_id = $classid;
        $sec->class_name = $className;
        $sec->tearcher_id = $teacherid;
        $sec->tearcher_name = $teacherName;
        $sec->note = $sectionNote;
        $sec->save();

        Session::flash('data', 'You successfully');
        return Redirect::to('sectionAdd');
    }

    public function geteditsection($secid) {
        //section info edit view for admin and insti
        $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
        $teacherlist = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $editsection = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $secid)->first();
      //  return $editsection->class_id;
        return view('admin.editsection')->with('editsection', $editsection)->with('teacher', $teacherlist)->with('classlist', $class);
    }

    public function postupdatesection($sectid) {
        //section info update for admin and insti
        $sectionname = Input::get('SectionName');
        $sectioncat = Input::get('sectioncategory');
        $sectionteacher = Input::get('teachername');
        $sectionclass = Input::get('classname');
        $sectionnote = Input::get('sectionNote');

    //return $sectionclass.'-'.$sectionteacher;
    $classidname = ClassAdd::where('class_id', '=', $sectionclass)->where('institute_code', '=', Auth::user()->institute_id)->pluck('class_name');
    $teachername = Teacher::where('teacher_id', '=', $sectionteacher)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');

    $sectionupdate = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $sectid)->update(['section_name' => $sectionname,'section_category' => $sectioncat, 'class_name' => $classidname, 'class_id' => $sectionclass, 'tearcher_name' => $teachername, 'tearcher_id' => $sectionteacher , 'note' => $sectionnote ]);
    Session::flash('data', 'Update successfully added !');
    return Redirect::to('section/edit/' . $sectid);

    }
    public function deletesection($sectid){
      //saif section delete
    $sectionDelete = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $sectid)->delete();
    Session::flash('data', 'Delete successfully!');
    return Redirect::to('sectionAdd');
    }


    public function getAddExam(){
    //Moin
    //Exam get Function for admin
    $getexam=Exam::where('institute_code', '=', Auth::user()->institute_id)->get();
    return view('admin.addexam',['examview'=>$getexam]);

}





    public function postAddExam(){
        //Moin
        //Exam post Function for admin
        $examname=Input::get('examname');
        $date=Input::get('date');
        $note=Input::get('note');
        //return $examname.'/'.$date.'/'.$note;
        $save=new Exam;
        $save-> institute_code=Auth::user()->institute_id;
        $save-> exam_id='exam'.mt_rand('1', '9999');
        $save-> exam_name=$examname;
        $save-> exam_date=$date;
        $save-> note=$note;
        $save->save();
        Session::flash('data', 'Update successfully added !');
        return Redirect::to('/admin/add/exam');
    }
    public function getEditExam($eid){
        //Moin
        //Exam edit Function for admin
        $editexam=Exam::where('exam_id','=',$eid)->where('institute_code', '=', Auth::user()->institute_id)->first();
        return view('admin.examedit',['editexamview'=>$editexam]);
    }

    public function updateEditExam($eid) {
        //Moin
        //Exam update Function for admin
        $updateexam=Exam::where('exam_id','=',$eid)->where('institute_code', '=', Auth::user()->institute_id)
            ->update(['exam_name' => Input::get('examname'),
                'exam_date' => Input::get('date'),
                'note' => Input::get('note')
                 ]);
        Session::flash('data', 'Update successfully added !');
        return Redirect::to('exam/edit/' . $eid);
    }
    public function deleteExamInfo($eid) {
        //Moin
        //Exam delete Function for admin
        $classupdate = Exam::where('exam_id', '=', $eid)->where('institute_code', '=', Auth::user()->institute_id)->delete();
        Session::flash('data', 'Data successfully Deleted !');
        return Redirect::to('/admin/add/exam');
    }
    public function getExamSchedule(){
        //Moin
        //Exam Schedule get Function for admin
        $examname=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id','exam_name');
        $classname=ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id','class_name');
        $schedule=ExamSchedule::where('institute_code', '=', Auth::user()->institute_id)->get();
        //return $schedule;
        return view('admin.examschedule',['examview'=>$examname,'classview'=>$classname,'examschedule'=>$schedule]);
    }
public function postExamSchedule(){
    //Moin
    //Exam Schedule get Function for admin
    $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
    $exam=Input::get('exam');
    $exam_name = Exam::where('institute_code', '=', Auth::user()->institute_id)->where('exam_id', '=', $exam)->pluck('exam_name');

    $class = Input::get('class');
    $class_name = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->where('class_id', '=', $class)->pluck('class_name');
     $sub_name= Input::get('subject');
    $sub_id = Subject::where('subject_name', '=', $sub_name)->pluck('id');
      $section_name= Input::get('section');
    $section_id = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_name', '=', $section_name)->pluck('section_id');
//return $iid.'/'.$class.'/'.$class_name.'/'.'ok'.$sub_id.'ok'.'/'.$sub_name.'/'.$section_id.'/'.$section_name;
    $su=new ExamSchedule;
    $su->institute_code=$iid;
    $su->exam_name=$exam_name;
    $su->class_id=$class;
    $su->class_name=$class_name;
    $su->section_id=$section_id;
    $su->section_name=$section_name;
    $su->sub_id=$sub_id;
    $su->sub_name=$sub_name;
    $su->exam_date=Input::get('date');
    $su->time_from=Input::get('timepickerfrom');
    $su->time_to=Input::get('timepickerto');
    $su->room_no=Input::get('room');
    $su->save();
    //return $su;
    Session::flash('data', 'Data successfully Added !');
    return Redirect::to('admin/add/exam/schedule');
}

        public function markIndex(){
          //saif markIndex view for admin and teacher
          $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
          $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
          $section = Section::where('institute_code', '=', Auth::user()->institute_id)->get();
          return view('admin.markindex')->with('section', $section)->with('teacher', $teacher)->with('allclass', $class);
        }

        public function markadd(){
         //saif markIndex view for admin and teacher
          $examName=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id', 'exam_name');
          $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
          $examSubj=Subject::where('institute_code', '=', Auth::user()->institute_id)->lists('subject_code', 'subject_name');

          return view('admin.markadd')->with('allclass', $class)->with('examName',$examName)->with('examSubj',$examSubj);
        }


        public function getgradeIndex(){
              //admin add grade system
          $this->getallclass();
          $allGrade=GradeSystem::where('institute_code', '=', Auth::user()->institute_id)->get();
          return view('admin.gradeIndex')->with('allclass',$this->getallclass())->with('allGrade',$allGrade);
        }
        public function postGradeIndex(){

          $GradeName=Input::get('GradeName');
          $GradePoint=Input::get('GradePoint');
          $MarkFrom=Input::get('MarkFrom');
          $MarkUpto=Input::get('MarkUpto');
          $MarkNote=Input::get('MarkNote');


          $save=new GradeSystem;
          $save-> institute_code=Auth::user()->institute_id;
          $save-> grade_id=mt_rand('1', '9999');
          $save-> grade_name=$GradeName;
          $save-> grade_point=$GradePoint;
          $save-> mark_form=$MarkFrom;
          $save-> mark_upto=$MarkUpto;
          $save-> note=$MarkNote;
          $save->save();
          Session::flash('data', 'Update successfully added !');
          return Redirect::to('grade/index');

        }
        public function getGradeEdit($gid){

          $getEditGrade=GradeSystem::where('institute_code', '=', Auth::user()->institute_id)->where('grade_id','=',$gid)->first();
          return view('admin.gradeEdit')->with('getEditGrade',$getEditGrade);
        }

        public function postGradeEdit($gid){
        //  return $gid;
          $GradeName=Input::get('GradeName');
          $GradePoint=Input::get('GradePoint');
          $MarkFrom=Input::get('MarkFrom');
          $MarkUpto=Input::get('MarkUpto');
          $MarkNote=Input::get('MarkNote');
          $getEditGradeupdate=GradeSystem::where('institute_code', '=', Auth::user()->institute_id)->where('grade_id','=',$gid)->update(['grade_name'=>$GradeName,'grade_point'=>$GradePoint,'mark_form'=>$MarkFrom,'mark_upto'=>$MarkUpto,'note'=>$MarkNote]);
        // return $getEditGrade;
          Session::flash('data', 'Update successfully added !');
          return Redirect::to('grade/edit/'.$gid);
        }

        public function GradeDelete($gid){

            $getEditGradeDelete=GradeSystem::where('institute_code', '=', Auth::user()->institute_id)->where('grade_id','=',$gid)->delete();
            Session::flash('data', 'Delete successfully!');
            return Redirect::to('grade/index');
        }

    public function getEditExamSchedule($id){
        //Moin
        //Exam Schedule get Function for admin
        $icode= User::where('institute_id','=',Auth::user()->institute_id)->pluck('institute_id');
        $examname=Exam::where('institute_code', '=', Auth::user()->institute_id)->lists('exam_id','exam_name');
        $classname=ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id','class_name');
        $schedule=ExamSchedule::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=', $id)->first();
        //return $schedule;
        return view('admin.editexamschedule',['examview'=>$examname,'classview'=>$classname,'examschedule'=>$schedule,'icode'=>$icode]);
    }
    public function updateEditExamSchedule($id){
        //Moin
        //Exam Schedule get Function for admin
        $iid=User::where('uid','=',Auth::user()->uid)->pluck('institute_id');
        $exam=Input::get('exam');
        $exam_name = Exam::where('institute_code', '=', Auth::user()->institute_id)->where('exam_id', '=', $exam)->pluck('exam_name');

        $class = Input::get('class');
        $class_name = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->where('class_id', '=', $class)->pluck('class_name');
        $sub_name= Input::get('subject');
        $sub_id = Subject::where('subject_name', '=', $sub_name)->pluck('id');
        $section_name= Input::get('section');
        $section_id = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_name', '=', $section_name)->pluck('section_id');
        $exam_date=Input::get('date');
        $time_from=Input::get('timepickerfrom');
        $time_to=Input::get('timepickerto');
        $room_no=Input::get('room');
 //return $iid.'/'.$class.'/'.$class_name.'/'.'ok'.$sub_id.'ok'.'/'.$sub_name.'/'.$section_id.'/'.$section_name;
        $studentup = ExamSchedule::where('institute_code', '=', Auth::user()->institute_id)->where('id', '=', $id)
            ->update(['exam_name' => $exam_name,
                'class_id' => $class,
                'class_name' => $class_name,
                'section_id' => $section_id,
                'section_name' => $section_name,
                'sub_id' => $sub_id,
                'sub_name' => $sub_name,
                'exam_date' => $exam_date,
                'time_from' => $time_from,
                'time_to' => $time_to,
                'room_no' => $room_no

            ]);
        //return $su;
        Session::flash('data', 'Data successfully Added !');
        return Redirect::to('admin/add/exam/schedule');
    }
    public function deleteExamScheduleInfo($id) {
        //Moin
        //Exam delete Function for admin
        $classupdate = ExamSchedule::where('id', '=', $id)->where('institute_code', '=', Auth::user()->institute_id)->delete();
        Session::flash('data', 'Data successfully Deleted !');
        return Redirect::to('admin/add/exam/schedule');
    }
}
