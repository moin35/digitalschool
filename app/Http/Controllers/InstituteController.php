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

class InstituteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getaddclass() {
        //class info add institute //saif
        $classInfo = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->get();
        $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        return view('admin.ClassAdd')->with('teacher', $teacher)->with('classallinfo', $classInfo);
    }

    public function postaddclass() {
        //class info post institute //saif
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
        //class info edit institute //saif
        $teacherlist = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $classupdate = ClassAdd::where('class_id', '=', $clid)->where('institute_code', '=', Auth::user()->institute_id)->first();

        return view('admin.classupdate')->with('classupdate', $classupdate)->with('teacher', $teacherlist);
    }

    public function postupdateclass($clsid) {
        //class info update institute //saif

        $clname = Input::get('classname');
        $clteachername = Input::get('teachername');
        $clnumaric = Input::get('classnumaric');
        $clnote = Input::get('ClassNote');
        $classupdate = ClassAdd::where('class_id', '=', $clsid)->where('institute_code', '=', Auth::user()->institute_id)->update(['class_name' => $clname, 'class_name_numaric' => $clnumaric, 'teacher_name' => $clteachername, 'note' => $clnote]);
        Session::flash('data', 'Data successfully added !');
        return Redirect::to('class/edit/' . $clsid);
    }

    public function deleteclass($clsid) {
        //class info delete institute //saif
        $classupdate = ClassAdd::where('class_id', '=', $clsid)->where('institute_code', '=', Auth::user()->institute_id)->delete();
        Session::flash('data', 'Data successfully Delete !');
        return Redirect::to('Addclass');
    }

    public function getsection() {
        //Section info add institute //saif
        $teacher = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
        $section = Section::where('institute_code', '=', Auth::user()->institute_id)->get();
        return view('admin.sectionadd')->with('section', $section)->with('teacher', $teacher)->with('allclass', $class);
    }

    public function postsection() {
        //Section info post institute //saif
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
        //section info edit view
        $class = ClassAdd::where('institute_code', '=', Auth::user()->institute_id)->lists('class_id', 'class_name');
        $teacherlist = Teacher::where('institute_code', '=', Auth::user()->institute_id)->lists('teacher_id', 'name');
        $editsection = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $secid)->first();
      //  return $editsection->class_id;
        return view('admin.editsection')->with('editsection', $editsection)->with('teacher', $teacherlist)->with('classlist', $class);
    }

    public function postupdatesection($sectid) {
        //section info update
        $sectionname = Input::get('sectionname');
        $sectioncat = Input::get('sectioncategory');
        $sectionteacherid = Input::get('teachername');
        $sectionclass = Input::get('classname');
        $sectionnote = Input::get('sectionNote');
      
       // return $sectionclass.''.$sectionteacherid;
        /*
         * $classid = ClassAdd::where('class_name', '=', $sectionclass)->where('institute_code', '=', Auth::user()->institute_id)->pluck('class_name');
        $teachername = Teacher::where('name', '=', $sectionteacherid)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');

        if ($sectionclass == $classid && $sectionteacherid == $teachername) {
            // return $sectionclass.''.$sectionteacherid;
            Session::flash('data', 'Update successfully added !');
            $sectionupdate = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $sectid)->update(['section_name' => $sectionname,
                'section_category' => $sectioncat, 'class_name' => $sectionclass, 'tearcher_name' => $sectionteacherid, 'note' => $sectionnote]);
            return Redirect::to('section/edit/' . $sectid);
        } elseif ($sectionclass == $classid || $sectionteacherid == $teachername) {

            Session::flash('data', 'Update successfully added !');
            $sectionupdate = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $sectid)->update(['section_name' => $sectionname,
                'section_category' => $sectioncat, 'class_name' => $sectionclass, 'tearcher_name' => $sectionteacherid, 'note' => $sectionnote]);
            return Redirect::to('section/edit/' . $sectid);
        } else {
            */
            $classidid = ClassAdd::where('class_id', '=', $sectionclass)->where('institute_code', '=', Auth::user()->institute_id)->pluck('class_name');
            $teachernameid = Teacher::where('teacher_id', '=', $sectionteacherid)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');
          
            $sectionupdate = Section::where('institute_code', '=', Auth::user()->institute_id)->where('section_id', '=', $sectid)->update(['section_name' => $sectionname,
                'section_category' => $sectioncat, 'class_name' => $classidid, 'class_id' => $sectionclass, 'tearcher_name' => $teachernameid, 'tearcher_id' => $sectionteacherid, 'note' => $sectionnote]);
            Session::flash('data', 'Update successfully added !');
            return Redirect::to('section/edit/' . $sectid);
      //  }
        /* $teachername=  Teacher::where('teacher_id', '=', $sectionteacherid)->where('institute_code', '=', Auth::user()->institute_id)->pluck('name');
          $classid = ClassAdd::where('class_name', '=', $sectionclass)->orWhere('class_name', '=', $sectionclass)->where('institute_code', '=', Auth::user()->institute_id)->pluck('class_name');

          //return $classid .'----'.$sectionclass;
          $sectionupdate=  Section::where('institute_code','=',Auth::user()->institute_id)->where('section_id','=',$sectid)->update(['section_name'=>$sectionname,
          'section_category'=>$sectioncat,'class_name'=>$classid,'class_id'=>$sectionclass,'tearcher_name'=>$teachername,'tearcher_id'=>$sectionteacherid,'note'=>$sectionnote]);
          Session::flash('data', 'Update successfully added !');
          return Redirect::to('section/edit/' . $sectid); */
    }

}
