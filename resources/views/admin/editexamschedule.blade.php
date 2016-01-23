@extends('layouts.submaster')
@section('title')
    Edit | Student's
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Student's  Edit Information
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
                                            Exam Name                             </label><br>
                                        <div class="col-sm-6">

                                            <select  id="exam" name="exam" class="form-control"  >
                                                <option  selected="selected" value="{{$examschedule->exam_name}}">{{$examschedule->exam_name}}</option>
                                                @foreach($examview as $r=>$t)
                                                    <option value="{{$t}}">{{$r}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="class" class="col-sm-2 col-sm-offset-2 control-label-right">Class</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15 class"   name="class" type="text">
                                                <option selected="selected" value="{{$examschedule->class_name}}">{{$examschedule->class_name}}</option>
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
                                                <option  selected="selected" value="{{$examschedule->section_name}}">{{$examschedule->section_name}}</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                            Subject </label><br>
                                        <div class="col-sm-6">
                                            <select    name="subject"  class="form-control sub" >
                                                <option  selected="selected" value="{{$examschedule->sub_name}}">{{$examschedule->sub_name}}</option>

                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Date</label>
                                        <div class="col-lg-6">
                                            <input value="{{$examschedule->exam_date}}" class="form-control form-control-inline input-medium default-date-picker" id="date" name="date" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Time Form</label>
                                        <div class="col-lg-6">
                                            <input value="{{$examschedule->time_from}}" class="form-control" id='timepicker' type='text'name='timepickerfrom' />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode"  class="col-sm-2 col-sm-offset-2 control-label-right">Time To</label>
                                        <div class="col-lg-6">
                                            <input  value="{{$examschedule->time_to}}"class="form-control" id="timeto" name="timepickerto" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Room No.</label>
                                        <div class="col-lg-6">
                                            <input value="{{$examschedule->room_no}}" class="form-control " id="room" name="room" type="text" />
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
                            <b>  <i class="fa fa-check"></i>Last Update: {{$examschedule->updated_at}}</b>
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