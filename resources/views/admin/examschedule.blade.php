@extends('layouts.submaster')
@section('title')
    Add Exam Schedule
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
                                        Add Exam Schedule <i class="fa fa-plus"></i>
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
                                                                                    <div class="form-group">
                                                                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                            Exam Name                             </label><br>
                                                                                        <div class="col-sm-6">

                                                                                            <select  id="exam" name="exam" class="form-control"  >
                                                                                                <option  selected="selected" >Choose Exam Name</option>
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
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Date</label>
                                                                                        <div class="col-lg-6">
                                                                                            <input class="form-control form-control-inline input-medium default-date-picker" id="date" name="date" type="text" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Time Form</label>
                                                                                        <div class="col-lg-6">
                                                                                            <input class="form-control" id='timepicker' type='text'name='timepickerfrom' />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <label for="icode" class="col-sm-2 col-sm-offset-2 control-label-right">Time To</label>
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


                </div>
            </section>

            <section class="panel">
                <!-- page start-->

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                ALL Institute
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
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Room</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($examschedule as $a)
                                            <tr class="">
                                                <td>{{$a->exam_name}}</td>
                                                <td>{{$a->class_name}}</td>
                                                <td>{{$a->section_name}}</td>
                                                <td class="center">{{$a->sub_name}}</td>
                                                <td class="center">{{$a->exam_date}}</td>
                                                <td>{{$a->time_from}}-{{$a->time_to}}</td>
                                                <td>{{$a->room_no}}</td>
                                                <td> <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/exam/schedule/edit/{{$a->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/exam/schedule/delete/{{$a->id}}" ><i class="fa  fa-trash-o"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!---end----!>
                              <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Modal Tittle</h4>
                                        </div>
                                        <div class="modal-body">

                                            Body goes here...

                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-warning" type="button"> Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>This is a large modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
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
        function TestCtrl() {
            var self = this;
            self.showBoxOne = false;
            self.showBoxTwo = false;
        }

        angular.module('app', ['ngAnimate'])
                .controller('TestCtrl', TestCtrl)
    </script>

@stop
