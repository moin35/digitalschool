@extends('layouts.submaster')
@section('title')
    Balance
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
                    New Student Table
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
                                    <div class="col-sm-6">
                                        <select type="search" class="form-control select-table-filter " data-table="order-table">
                                            <option value="">Reset</option>
                                            @foreach($class as $r=>$t)
                                                <option value="{{$r}}">{{$r}}</option>
                                            @endforeach
                                            <select>

                                    </div>

                                </div>
                            </form>
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
                                ALL Section Information
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa-sort-desc"></a>
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
                                    <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name <i class="fa-caret-up"></i></th>

                                            <th>Class</th>
                                            <th>Phone</th>
                                            <th>Photo</th>
                                            <th>Total Payment</th>
                                            <th>Paid Payment</th>
                                            <th>Due</th>
                                            <th>Total Balance</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($balance as $c)
                                            <tr class="">
                                                <td>{{$c->id}}</td>
                                                <td> {{$c->student_name}}</td>
                                                <td> {{$c->class_name}}</td>
                                                <td> {{$c->phone}}</td>

                                                <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/{{$c->image}} "></td>
                                                <td> {{$c->total_amount}}</td>
                                                <td> {{$c->payment_ammount}}</td>
                                                <td> {{$c->due_amount}}</td>
                                                <td> {{$c->payment_ammount}}</td>
                                                <td><a href="">Detail</a> </td>
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
