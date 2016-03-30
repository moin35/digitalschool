@extends('layouts.submaster')
@section('title')
Exam Schedule
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

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!---end----!>


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
