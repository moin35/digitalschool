@extends('layouts.submaster')
@section('title')
    Add Routine
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">


@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Exam Schedule Info.
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
                                <div class="btn-group">
                                    <a class="btn btn-primary" ng-click="test.showBoxOne = !test.showBoxOne" >
                                        Add Routine <i class="fa fa-plus"></i>
                                    </a>
                                </div>


                                @if(Session::get('data'))
                                    <div class="bs-example">
                                        <div class="alert alert-success fade in">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            <strong>{{Session::get('data')}}</strong>.
                                        </div>
                                    </div>

                                @endif

                                <div class="btn-group pull-right">

                                </div>
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Exam Schedule Add Information
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                                </header>
                                                <div class="panel-body">
                                                    {!!Form::open(array('id'=>'signupinstute','class'=>'cmxform form-horizontal')) !!}
                                                    <section class="panel">

                                                        <div class="panel-body">

                                                            <br><br>
                                                            <div class="form">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-8" >
                                                                    <div class="row">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div class="list-group-item list-group-item-warning">
                                                                                <div style="" class="form-horizontal" >

                                                                                    <div class="form-group ">
                                                                                        <label for="class" class="col-sm-2 col-sm-offset-2 control-label-right">Class</label>
                                                                                        <div class="col-lg-6">
                                                                                            <select class="form-control input-sm m-bot15 class"   name="class" type="text">
                                                                                                <option selected="selected">Select Class</option>
                                                                                                @foreach($classview as $r=>$t)
                                                                                                    <option value="{{$t}}">{{$r}}</option>
                                                                                                @endforeach
                                                                                            </select>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                            Section </label><br>
                                                                                        <div class="col-sm-6">
                                                                                            <select    name="section" class="form-control sectionid" >
                                                                                                <option  selected="">First Choose Class</option>

                                                                                            </select>


                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                            Subject </label><br>
                                                                                        <div class="col-sm-6">
                                                                                            <select    name="subject"  class="form-control subject" >
                                                                                                <option  selected="">First Choose Class</option>

                                                                                            </select>


                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Time Form</label>
                                                                                        <div class="col-lg-6">
                                                                                            <select name="day" id="day" class="form-control">
                                                                                                <option value="SUNDAY">SUNDAY</option>
                                                                                                <option value="MONDAY">MONDAY</option>
                                                                                                <option value="TUESDAY">TUESDAY</option>
                                                                                                <option value="WEDNESDAY">WEDNESDAY</option>
                                                                                                <option value="THURSDAY">THURSDAY</option>
                                                                                                <option value="FRIDAY">FRIDAY</option>
                                                                                                <option value="SATURDAY">SATURDAY</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Starting Time</label>
                                                                                        <div class="col-lg-6">
                                                                                            <input class="form-control" id="timeto" name="timepickerform" type="text" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">End Time</label>
                                                                                        <div class="col-lg-6">
                                                                                            <input class="form-control" id="timeto" name="timepickerto" type="text" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Room No.</label>
                                                                                        <div class="col-lg-6">
                                                                                            <input class="form-control " id="room" name="room" type="text" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-lg-offset-3 col-lg-6">
                                                                                            <button class="btn btn-primary" type="submit">Save</button>
                                                                                            <button class="btn btn-default" type="reset">Cancel</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2"></div>

                                                            </div>
                                                        </div>
                                                    </section>
                                                    {!!Form::close()!!}

                                                </div>
                           
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="space15"></div>

                    </div>
                     <div class="row">
                                                                <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">
                               {!! Form::open(['id'=>'demoForm','class'=>'demoForm  form-horizontal','route'=>'searchroutine','files'=>'true']) !!}
                                       
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-6">
                                            <select type="search" name="class" class="form-control" onchange='this.form.submit()'>
                                                <option value="">Select Class</option>
                                                @foreach($classview as $r=>$t)
                                                    <option value="{{$r}}">{{$r}}</option>
                                                @endforeach
                                                <select>
                                                 <noscript>{!!Form::submit('Submit',['class'=>'','type'=>'submit','value'=>'Submit'])!!}</noscript>
                                      
                                        </div>
                                    </div>
                                 {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                
                    <ul class="nav nav-tabs">
                    
                        <li class="active">
                            <a data-toggle="tab" href="#home">All Routine</a>
                        </li>
                     
                        @foreach($section as $r=>$t)
                        <li >
                            <a data-toggle="tab" href="#{{$r}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$r}} ({{$t}})</a>
                        </li>
                      @endforeach
                    </ul>
                 
                </header>
                <div class="panel-body">
                    <div class="tab-content">

                        <div id="home" class="tab-pane active" style="background-color: #00A8B3;">
                            <div class="col-md-12">
                              <div class="row">
                              <div class="col-md-1">SATURDAY</div>
                                  @foreach($sat as $r)
                                  <div class="col-md-2 round">
                                      <label style="background-color: #56C9F5;padding: 5px;" align="center">

                                        Class: {{$r->class_name}}<br>
                                        Starting Time: {{$r->start_timeday}}<br>
                                        Ending Time: {{$r->end_time}}<br>
                                        Room No: {{$r->room_no}}<br>
                                        Section: {{$r->section_name}}<br>
                                          <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                          <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                      </label>
                                  </div>
                                  @endforeach
                              </div>
                              </div>
                                <div class="col-md-12" >
                                    <div class="row">
                                        <div class="col-md-1">SUNDAY</div>
                                        @foreach($sun as $r)
                                            <div class="col-md-2">
                                                <label class=" round" style="background-color: #56C9F5;padding: 5px;" align="center">
                                               Class: {{$r->class_name}}<br>
                                               Starting Time: {{$r->start_timeday}}<br>
                                               Ending Time: {{$r->end_time}}<br>
                                               Room No: {{$r->room_no}}<br>
                                               Section: {{$r->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">MONDAY</div>
                                        @foreach($mon as $r)
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$r->class_name}}<br>
                                                Starting Time: {{$r->start_timeday}}<br>
                                                Ending Time: {{$r->end_time}}<br>
                                                Room No: {{$r->room_no}}<br>
                                                Section: {{$r->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">TUESDAY</div>
                                        @foreach($tue as $r)
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$r->class_name}}<br>
                                                Starting Time: {{$r->start_timeday}}<br>
                                                Ending Time: {{$r->end_time}}<br>
                                                Room No: {{$r->room_no}}<br>
                                                Section: {{$r->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">WEDNESDAY</div>
                                        @foreach($wed as $r)
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$r->class_name}}<br>
                                                Starting Time: {{$r->start_timeday}}<br>
                                                Ending Time: {{$r->end_time}}<br>
                                                Room No: {{$r->room_no}}<br>
                                               Section: {{$r->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">THURSDAY</div>
                                        @foreach($thu as $r)
                                            <div class="col-md-2" >
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$r->class_name}}<br>
                                                Starting Time: {{$r->start_timeday}}<br>
                                                Ending Time: {{$r->end_time}}<br>
                                                Room No: {{$r->room_no}}<br>
                                               Section: {{$r->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">FRIDAY</div>
                                        @foreach($fri as $r)
                                            <div class="col-md-2" style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$r->class_name}}<br>
                                                Starting Time: {{$r->start_timeday}}<br>
                                                Ending Time: {{$r->end_time}}<br>
                                                Room No: {{$r->room_no}}<br>
                                                Section: {{$r->section_name}}<br>
                                                <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @foreach($sec as $r)

                            <div id="{{$r->section_name}}" class="tab-pane">
                                <div class="col-md-12">
                              <div class="row">
                              <div class="col-md-1">SATURDAY</div>
                                  @if($s=\APP\ClassRoutine::where('day','=','SATURDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())

                                      <div class="col-md-2">no data</div><div class="col-md-2">no data</div>
                                      <div class="col-md-2">
                                          <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                         Class: {{$s->class_name}}<br>
                                         Starting Time: {{$s->start_timeday}}<br>
                                         Ending Time: {{$s->end_time}}<br>
                                         Room No: {{$s->room_no}}<br>
                                         Section: {{$s->section_name}}<br>
                                              <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                              <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                          </label>
                                      </div>
                                  @else
                                      <div class="col-md-2">no data</div>
                                  @endif
                              </div>
                              </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">SUNDAY</div>

                                        @if($s=\APP\ClassRoutine::where('day','=','SUNDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-3"></div>
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                              Class:  {{$s->class_name}}<br>
                                              Starting Time:  {{$s->start_timeday}}<br>
                                              Ending Time:  {{$s->end_time}}<br>
                                              Room No:  {{$s->room_no}}<br>
                                              Section:  {{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                            @else
                                            <div class="col-md-2">no data</div>
                                      @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">MONDAY</div>
                                        @if($s=\APP\ClassRoutine::where('day','=','MONDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2" >
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class: {{$s->class_name}}<br>
                                                Starting Time: {{$s->start_timeday}}<br>
                                                Ending Time: {{$s->end_time}}<br>
                                                Room No: {{$s->room_no}}<br>
                                               Section:  {{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                            <div class="col-md-1"></div>
                                        @else
                                            <div class="col-md-2">no data</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">TUESDAY</div>
                                        @if($s=\APP\ClassRoutine::where('day','=','TUESDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                                Class:{{$s->class_name}}<br>
                                                Starting Time:{{$s->start_timeday}}<br>
                                               Ending Time: {{$s->end_time}}<br>
                                               Room No: {{$s->room_no}}<br>
                                                Section:{{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @else
                                            <div class="col-md-2">no data</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">WEDNESDAY</div>
                                        @if($s=\APP\ClassRoutine::where('day','=','WEDNESDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                               Class: {{$s->class_name}}<br>
                                               Starting Time: {{$s->start_timeday}}<br>
                                               Ending Time: {{$s->end_time}}<br>
                                               Room No: {{$s->room_no}}<br>
                                               Section: {{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @else
                                            <div class="col-md-2">no data</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">THURSDAY</div>
                                        @if($s=\APP\ClassRoutine::where('day','=','THURSDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                               Class: {{$s->class_name}}<br>
                                               Starting Time: {{$s->start_timeday}}<br>
                                               Ending Time: {{$s->end_time}}<br>
                                               Room No: {{$s->room_no}}<br>
                                               Section: {{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @else
                                            <div class="col-md-2">no data</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">FRIDAY</div>
                                        @if($s=\APP\ClassRoutine::where('day','=','FRIDAY')->where('section_name','=',$r->section_name)->where('class_name','=',$r->class_name)->first())
                                            <div class="col-md-2">
                                                <label style="background-color: #56C9F5;padding: 5px;" align="center">
                                               Class: {{$s->class_name}}<br>
                                              Starting Time:  {{$s->start_timeday}}<br>
                                              Ending Time:  {{$s->end_time}}<br>
                                              Room No:  {{$s->room_no}}<br>
                                              Section:  {{$s->section_name}}<br>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/class/routine/edit/{{$r->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/class/routine/delete/{{$r->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </label>
                                            </div>
                                        @else
                                            <div class="col-md-2">no data</div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            @endforeach
                        </div>

                  
                    </div>
                </div>
            </section>

                </div>
            </section>
        </div>
        </section>
    </div>
    </div>
    <!-- page end-->


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
