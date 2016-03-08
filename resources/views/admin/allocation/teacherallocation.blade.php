@extends('layouts.submaster')
@section('title')
Institute Duty Time Schedule
@stop
@section('head')
<script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
<script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
<link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
<link href="{{URL::to('/')}}/timepicker/pickercss.css" rel="stylesheet">
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
                        Assign Teacher Access
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
                                    <th>#</th>
                                    <th rowspan="2">Teacher</th>
                                    <th colspan="{{$count}}">shift</th>
                                    <th>Attdence</th>
                                    <th>Addmission</th>
                                    <th>Teacher Add</th>
                                    <th>Subject Add</th>
                                    <th>Exam Schedule</th>
                                    <th>Class Routine</th>
                                    <th>Notice</th>
                                    <th>SMS</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($tes as $s =>$m)
                            <tr>
                                <td><input value="{{$m->teacher_id}}" type="hidden">{{$m->name}}</td>
                                @foreach($sh as $t =>$r)
                                <td >{{$r->shift}}<input type="checkbox" class="" value="{{$r->id}}" name="egtime"></td>
                                @endforeach
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
                                <td><input type="checkbox" class="" value="1" name="egtime"></td>
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
            function TestCtrl() {
            var self = this;
                    self.showBoxOne = false;
                    self.showBoxTwo = false;
            }

    angular.module('app', ['ngAnimate'])
            .controller('TestCtrl', TestCtrl)
</script>
    <!-- JAvascript view auto increment number for table start-->
    <script>
        var tables = document.getElementsByTagName('table');
        var table = tables[tables.length - 1];
        var rows = table.rows;
        for(var i = 1, td; i < rows.length; i++){
            td = document.createElement('td');
            td.appendChild(document.createTextNode(i + 0));
            rows[i].insertBefore(td, rows[i].firstChild);
        }
    </script>
    <!-- JAvascript view auto increment number for table End-->
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> 
<script src="{{URL::to('/')}}/timepicker/pickerjs.js"></script>
@stop
