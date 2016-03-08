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
            <header class="panel-heading">
                Tiime Schedule
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
                                    Create Time Schedule  <i class="fa fa-plus"></i>
                                </a>
                            </div>


                              @if(Session::get('data'))
                            
<div class="alert alert-success alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                  {{Session::get('data')}}
                                </h4>

                            </div>

    @endif
                            <div class="btn-group pull-right">

                            </div>
                            <div class="box-one" ng-show="test.showBoxOne">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel">
                                            <header class="panel-heading">
                                               Institute Duty Time Schedule
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                            </header>
                                            <div class="panel-body">
                         {!!Form::open(array('id'=>'classinfo','class'=>'cmxform form-horizontal')) !!}
                                                <section class="panel">

                                                    <div class="panel-body">

                                                        <br><br>
                                                        <div class="form">
                                                            <div class="cmxform form-horizontal " id="signupFormt1">

                                                                <div class="form-group ">
                                                                    <label for="stime" class="control-label col-lg-3 ">Start Time</label>
                                                                    <input type="text" class="timepicker " name="stime" readonly>
                                                                </div>
                                                                    <div class="form-group ">
                                                                    <label for="sgtime" class="control-label col-lg-3">Start Grace Time</label>
                                                                    
                                                                          <input type="text" class="timepicker " name="sgtime" readonly>
                                                                 
                                                                </div>
                                                                    <div class="form-group ">
                                                                    <label for="etime" class="control-label col-lg-3">End Time</label>
                                                                   <input type="text" class="timepicker " name="etime" readonly>
                                                                </div>
                                                                    <div class="form-group ">
                                                                    <label for="egtime" class="control-label col-lg-3">End Grace Time</label>
                                                                   <input type="text" class="timepicker " name="egtime" readonly>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="sname" class="control-label col-lg-3">Schedule Name</label>
                                                                   <input type="text" class=" " name="schedule" >
                                                                </div>
                                                                     <div class="form-group ">
                                                                    <label for="oltime" class="control-label col-lg-3">Office Last Time</label>
                                                                   <input type="text" class="timepicker " name="oltime" readonly>
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
                        ALL Class Information
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
                                    <th>Schedule</th>
                                    <th>Work Time Start</th>
                                    <th>Grace Start Work Time</th>
                                    <th>Work Time End</th>
                                    <th>Grace End Work Time </th>
                                    <th>Last Office Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($v as $p=>$q)
                            <tr>
                                <td>{{$q->shift}}</td>
                                <td>{{$q->start_time}}</td>
                                <td>{{$q->strat_time_grace}}</td>
                                <td>{{$q->end_time}}</td>
                                <td>{{$q->end_time_grace}}</td>
                                <td>{{$q->extra_time}}</td>
                                <td><a class="btn btn-round btn-danger tooltips" title="Delete" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/employee/schedule/delete/{{$q->id}}" ><i class="fa  fa-trash-o"></i></a></td>
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
