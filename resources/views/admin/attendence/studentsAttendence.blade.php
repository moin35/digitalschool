@extends('layouts.submaster')
@section('title')
Student Attendance
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">
    <script src="{{URL::to('/')}}/js/indexdata.js"></script>
    <meta name="_token" content="{{ csrf_token() }}" />
    <style>

    .flipswitch
    {
        position: relative;
        background: #3e8c22;
        width: 120px;
        height: 40px;
        -webkit-appearance: initial;
        border-radius: 3px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline:none;
        font-size: 14px;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        cursor:pointer;
        border:1px solid #ddd;
       content:  "✓ P";
    }
    .flipswitch:after
    {
        position:absolute;
        top:5%;
        display:block;
        line-height:32px;
        width:45%;
        height:90%;
        background:green;
        box-sizing:border-box;
        text-align:center;
        transition: all 0.3s ease-in 0s;
        color:black;
        border:#888 1px solid;
        border-radius:3px;
    }
    .flipswitch:after
    {
        left:5%;
        content: "✓ P";
        background-color: red;
        value:0;
    }
    .flipswitch:checked:after
    {
        left:73%;
        content:  "✓ P";
        background-color: #3e8c22;
        color: #78d158;
        value:1;

    }

    </style>
@stop

@section('body')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                      Student Attendance
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">

                                  {!!Form::open(array('class'=>'cmxform form-horizontal')) !!}
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-8">
                                            <select class="form-control input-sm m-bot15 class"   name="class" type="text"  >
                                                  <option selected="selected">Select Class</option>
                                                @foreach($allclass as $r=>$t)

                                                  @if($classId==$t)
                                                    <option value="{{$t}}" selected="selected">{{$r}}</option>
                                                    @else
                                                    <option value="{{$t}}">{{$r}}</option>
                                                    @endif

                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">Section</label>
                                        <div class="col-lg-8">
                                            <select class="form-control input-sm m-bot15 sectionid"  name="section" type="text">

                                                @if($sectionName=='')
                                                  <option selected>Select a Section</option>
                                                  @else
                                                  <option value="{{$sectionName}}" selected="selected">{{$sectionName}}</option>
                                                  @endif

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                        Datetime                               </label>

                                  <div class="col-md-8">
                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                           <input type="text" class="form-control" readonly="" value='{{$dateTime}}' name="date" size="16">
                                           <div class="input-group-btn">
                                               <button type="button" class="btn btn-primary date-reset"><i class="fa fa-times"></i></button>
                                               <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                           </div>
                                       </div>
                                  </div>
                                  <br><br>  <br><br>
                                 <center>
                                    <button class="btn btn-primary" type="submit">  Attendance  <i class="fa fa-plus"></i></button>
                                     </center>
                              </div>
                              {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                                        <section class="panel">
                                            <!-- page start-->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <section class="panel">

                                                        <div class="panel-body">
                                                            <div class="adv-table editable-table ">
                                                                <div class="clearfix">

                                                                    <div class="btn-group pull-right">

                                                                    </div>
                                                                </div>
                                                                <div class="space15"></div>

                                                                <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Student Name <i class="fa-caret-up"></i></th>

                                                                        <th>Roll</th>
                                                                        <th>Phone</th>
                                                                        <th>Photo</th>
                                                                        <th>class</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody >

                                                                      @foreach ($GetStudents as $value)
                                                                           <tr class="">
                                                                            <td>{{$value->id}}</td>
                                                                            <td>{{$value->name}}</td>
                                                                            <td> {{$value->roll}}</td>
                                                                            <td> {{$value->phone}}</td>
                                                                            <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/{{$value->image}} "></td>
                                                                            <td> {{$value->class}}</td>
                                                                            <td>
                                                                            @if(\App\Attendence::where('uid','=',$value->st_id)->where('created_at','=',$value->created_at)->pluck('status')==0)
                                                                            <a   href="{{URL::to('/')}}/absent/attendence/student/{{$value->st_id}}" >  <input  type="button" value="✓ P"    name="stdAttendence[]"  class="btn btn-round btn-success" /></a>
                                                                             @else

                                                              <input  type="button" value="X A"  checked  name="stdAttendence[]"  class="btn btn-round btn-danger" />
                                                                               @endif


                                                                          </td>
                                                                           </tr>
                                                                        @endforeach


                                                                    </tbody>
                                                                </table>




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
            jQuery(document).ready(function($){
                n=1;
                $('.class').change(function(){
                    $.get("{{ url('api/dropdown/section')}}",
                            { option: $(this).val() },
                            function(data) {
                                var model = $('.sectionid');
                                model.empty();
                                $.each(data, function(index,element) {
                                //  alert(data);
                                    model.append("<option value='"+ element +"'>" + element + "</option>");
                                });
                            });
                });
            });
        </script>
<script>
    function TestCtrl() {
        var self = this;

        self.showBoxOne = false;
        self.showBoxTwo = false;


    }

    angular.module('app', ['ngAnimate'])
            .controller('TestCtrl', TestCtrl)
</script>
 @stop
