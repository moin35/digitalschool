@extends('layouts.submaster')
@section('title')
    Edit | Routine
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Routine Information
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <!--price start-->

                    <div class="col-lg-2 col-sm-2">

                    </div>
                    <div class="col-lg-8 col-sm-8">
                        @if(Session::get('data'))
                            <div class="bs-example">
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{Session::get('data')}}</strong>.
                                </div>
                            </div>

                        @endif
                        <div class="pricing-table most-popular">
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">Institute Code:{{$icode}}</a>
                            </div>

                            <br><br><br>
                            <hr>

                            <div class="list-unstyled">

                                {!! Form::open(array('id'=>'subjectinfo','class'=>'form-horizontal bucket-form','files'=>'true')) !!}

                                <div style="" class="form-horizontal" >
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                            Class                           </label><br>
                                        <div class="col-sm-6">
                                            <select class="form-control input-sm m-bot15 class"   name="class" type="text">
                                             @foreach($class as $r=>$t)
                                                    @if($classroutine->class_name==$t)
                                                        <option selected="selected" value="{{$classroutine->class_name}}">{{$classroutine->class_name}}</option>
                                                    @else
                                                        <option value="{{$t}}">{{$r}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="class" class="col-sm-2 col-sm-offset-2 control-label-right">Section</label>
                                        <div class="col-lg-6">
                                            <select    name="section" class="form-control sectionid" >

                                                <option selected="selected" value="{{$classroutine->section_name}}">{{$classroutine->section_name}}</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                            Subject </label><br>
                                        <div class="col-sm-6">
                                            <select    name="subject"  class="form-control sub" >
                                                <option selected="selected" value="{{$classroutine->subject_name}}">{{$classroutine->subject_name}}</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Day</label>
                                        <div class="col-lg-6">
                                            <select name="day" id="day" class="form-control">
                                                <option selected="selected" value="{{$classroutine->day}}">{{$classroutine->day}}</option>

                                                <option value="SUNDAY">SUNDAY</option>
                                                <option value="MONDAY">MONDAY</option>
                                                <option value="TUESDAY">TUESDAY</option>
                                                <option value="WEDNESDAY">WEDNESDAY</option>
                                                <option value="THURSDAY">THURSDAY</option>
                                                <option value="FRIDAY">FRIDAY</option>
                                                <option value="SATURDAY">SATURDAY</option>
                                            </select>      </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Starting Time</label>
                                        <div class="col-lg-6">
                                             <input value="{{$classroutine->start_timeday}}" class="form-control" id="timeto" name="timepickerform" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode"  class="col-sm-2 col-sm-offset-2 control-label-right">End Time</label>
                                        <div class="col-lg-6">
                                              <input value="{{$classroutine->end_time}}" class="form-control" id="timeto" name="timepickerto" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Room No.</label>
                                        <div class="col-lg-6">
                                            <input value="{{$classroutine->room_no}}" class="form-control " id="room" name="room" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!!Form::close()!!}

                        </div>

                    </div>
                    <div class="text-center">
                        <b>  <i class="fa fa-check"></i>Last Update: {{$classroutine->updated_at}}</b>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2">

                </div>
                <!--price end-->
        </div>
        </section>
    </div>
    </div>
    <!-- page end-->
@stop