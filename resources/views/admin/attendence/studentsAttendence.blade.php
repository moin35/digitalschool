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
                                <form style="" class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-8">
                                            <select class="form-control input-sm m-bot15 class"  name="class" type="text"  >
                                                  <option selected="selected">Select Class</option>
                                                @foreach($allclass as $r=>$t)
                                                    <option value="{{$t}}">{{$r}}</option>
                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">Section</label>
                                        <div class="col-lg-8">
                                            <select class="form-control input-sm m-bot15 sectionid"   name="section" type="text">
                                                <option selected>Select a Section</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                        Datetime                               </label>

                                  <div class="col-md-8">
                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                           <input type="text" class="form-control" readonly="" size="16">
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
                                </form>
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
                                                                    <tbody>

                                                                        <tr class="">
                                                                            <td>id}}</td>
                                                                            <td> name}}</td>
                                                                            <td> roll}}</td>
                                                                            <td> phone}}</td>

                                                                            <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/ "></td>
                                                                            <td>  class_name}}</td>
                                                                            <td>
                                                                               <input type="checkbox" checked data-on-label="<i class='fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>"></td>
                                                                        </tr>

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
 @stop
