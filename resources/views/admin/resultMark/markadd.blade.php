@extends('layouts.submaster')
@section('title')
Mark
@stop
@section('head')
<script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
<script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
<link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
<link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">
  <script src="{{URL::to('/')}}/js/indexdata.js"></script>


@stop

@section('body')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
               Mark
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div ng-app="app" ng-controller="TestCtrl as test">
                        <div class="clearfix">

                              @if(Session::get('data'))
                              <div class="bs-example">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>{{Session::get('data')}}</strong>.
    </div>
</div>

    @endif
                        </div>

                    </div>
                    <div class="space15"></div>

                </div>

     <div class="col-md-3"></div>
               <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">

                                  {!!Form::open(array('class'=>'cmxform form-horizontal')) !!}


                                  <div class="form-group">
                                      <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                          Exam                                </label>
                                      <div class="col-sm-6">

                                          <select name="examName" class="form-control select-table-filter" data-table="order-table">
                                              <option value="">Reset</option>
                                              @foreach($examName as $r=>$t)
                                                  <option value="{{$r}}">{{$r}}</option>
                                              @endforeach
                                              <select>

                                      </div>
                                  </div>
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-6">

                                            <select  class="form-control select-table-filter class" name="classid" id="classid" >
                                                <option value="">Reset</option>
                                                @foreach($allclass as $r=>$t)
                                                    <option value="{{$t}}">{{$r}}</option>
                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">Section</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15 sectionid" id="classid" name="section" type="text">
                                                <option selected>Select a Section</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Subject                                </label>
                                        <div class="col-sm-6">

                                            <select  class="form-control select-table-filter" name="subject" id="subject_code">
                                                  <option  selected="selected">First Choose Class</option>
                                                <select>

                                        </div>
                                    </div>


                                    <center>

                                      <button class="btn btn-primary" type="submit">    Mark  <i class="fa fa-plus"></i></button>

                                     </center>
                                {!!Form::close()!!}
                            </div>
                        </div>

                        <div class="col-md-3"></div>

            </div>
        </section>



                    <section class="panel">
                        <!-- page start-->

                        <div class="row">
                            <div class="col-sm-12">


                              <section class="panel">
                                       <header class="panel-heading">
                                           ALL Mark Information
                                   <span class="tools pull-right">
                                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                                       <a href="javascript:;" class="fa fa-cog"></a>
                                       <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
                                       </header>
                                       <div class="panel-body">
                                           <div class="adv-table editable-table ">
                                               <div class="clearfix">

                                                   <div class="btn-group pull-right">

                                                   </div>
                                               </div>
                                               <div class="space15"></div>
                                        {!!Form::open(array('class'=>'cmxform form-horizontal','id'=>'myform','action'=>'InstituteController@postAddMarkall')) !!}
                                               <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                                   <thead>
                                                   <tr>
                                                       <th>#</th>
                                                       <th>Photo</th>
                                                       <th>StudentName <i class="fa-caret-up"></i></th>
                                                       <th>Phone</th>
                                                       <th>Roll</th>
                                                       <th>Mark</th>

                                                   </tr>
                                                   </thead>
                                                   <tbody>


                                                     @if(App\Mark::where('class_id','=',$classId)->where('exam_name','=',$examNameviews)->where('exam_subject','=',$subJNames)->count()==0)

                                  @foreach($addmake as $c)
                                      <tr class="">
                                          <td>{{$c->id}}</td>
                                          <td><img src="{{URL::to('/')}}/images/{{$c->image}}" width="35px" height="35px" class="img-rounded" alt=""></td>
                                          <td> {{$c->name}}</td>
                                          <td><a  href="a url">{{$c->phone}}</a></td>
                                          <td><a  href="a url">{{$c->roll}}</a></td>
                                           <input type="hidden" value="{{$c->class_id}}"  name="classId[]">
                                         <input type="hidden" value="{{$c->class_name}}"  name="ClassName[]">
                                           <input type="hidden" value="{{$examNameviews}}"  name="examName[]">
                                           <input type="hidden" value="{{$subJNames}}"  name="subjName[]">
                                            <input type="hidden" value="{{$section}}"  name="sectionName[]">
                                           <input type="hidden" value="{{$c->st_id}}"  name="stdId[]">
                                            <input type="hidden" value="{{$c->roll}}"  name="stdRoll[]">
                                           <input type="hidden" value="{{$c->name}}"  name="stdName[]">
                                           <input type="hidden" value="{{$c->image}}"  name="stdImage[]">
                                           <input type="hidden" value="{{$c->phone}}"  name="stdphone[]">
                                              <input type="hidden" value="{{Auth::user()->institute_id}}"  name="iid[]">

                                                  <td>
                          <input class="form-control mark" style="width:90px;" maxlength="100" type="number" value=""  name="mark[]">



                                                </td>
                                          </tr>
                                           @endforeach

                                             @else

                                             @foreach($markForStdSub1 as $c)
                                                     <tr class="">
                                                  <td>{{$c->id}}</td>
                                                  <td><img src="{{URL::to('/')}}/images/{{$c->image}}" width="35px" height="35px" class="img-rounded" alt=""></td>
                                                  <td> {{$c->name}}</td>
                                                  <td><a  href="a url">{{$c->phone}}</a></td>
                                                  <td><a  href="a url">{{$c->roll}}</a></td>
                                                 <input type="hidden" value="{{$c->class_id}}"  name="classId[]">
                                                   <input type="hidden" value="{{$c->class_name}}"  name="ClassName[]">
                                                   <input type="hidden" value="{{$examNameviews}}"  name="examName[]">
                                                   <input type="hidden" value="{{$subJNames}}"  name="subjName[]">
                                                   <input type="hidden" value="{{$c->student_id}}"  name="stdId[]">
                                                     <input type="hidden" value="{{$c->roll}}"  name="stdRoll[]">
                                                   <input type="hidden" value="{{$c->student_name}}"  name="stdName[]">
                                                   <input type="hidden" value="{{$c->image}}"  name="stdImage[]">
                                                   <input type="hidden" value="{{$c->phone}}"  name="stdphone[]">

                                                       <td>
                                                   <input class="form-control mark" style="width:90px;" maxlength="100" type="number" value="{{$c->sub_mark}}"  name="mark[]">



                                                 </td>
                                                 </tr>
                                                  @endforeach





                                                         @endif




                                                   </tbody>

                                               </table>


                                             <center>  <button class="btn btn-primary" type="submit">  Add  Mark  <i class="fa fa-plus"></i></button>

                                       </center>
                                     {!!Form::close()!!}
                                           </div>


                                       </div>
                                   </section>

                            </div>
                        </div>
                        <!-- page end-->

                    </section>

            </div>
        </section>
    </div>
</div>
<!-- page end-->

 <script>

 var formData = $("#myform").serializeArray();
 var URL = $("#myform").attr("action");
 $.post(URL,
 	formData,
 	function(data, textStatus, jqXHR)
 	{
 		//data: Data from Server
 	}).fail(function(jqXHR, textStatus, errorThrown)
 	{
 	});

/*

$("document").ready(function(){
        var base_url = 'http://localhost';

        $("#myform").submit(function(e){
            e.preventDefault();

          //  var examName = $("input#examName").val();
            //var classid = $("input#classid").val();
            //var stock = $("input#subject_code").val();

          //  var dataString = 'examName='+size+'&amp;classid='+option_id+'&amp;stock='+stock+'&amp;';
            $.ajax({
                type: "POST",
                url : base_url + "/mark/add/all",
                data : dataString,
                success : function(data){
                    console.log(data);
                }
            },"html");

    });
 });*/
 </script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>
@stop
