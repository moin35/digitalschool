@extends('layouts.submaster')
@section('title')
Govt. Holiday
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
                        <div class="adv-table editable-table ">
                                <div ng-app="app" ng-controller="TestCtrl as test">
                                    <div class="clearfix">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" ng-click="test.showBoxOne = !test.showBoxOne" >
                                              Govt. Holiday <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        @if(Session::get('data'))
                                            <div class="alert alert-dismissible alert-info">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong> <h3>{{Session::get('data')}}</h3></strong>
                                            </div>
                                        @endif
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#">Print</a></li>
                                                <li><a href="#">Save as PDF</a></li>
                                                <li><a href="#">Export to Excel</a></li>
                                            </ul>
                                        </div>
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Govt. Holiday
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                                                </header>
                                                <div class="panel-body">

                                                    {!!Form::open(array('class'=>'cmxform form-horizontal','id'=>'taskForm')) !!}


                                                    <form id="taskForm" method="post" class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-xs-1 control-label">Task(s)</label>
                                                            <div class="col-xs-3">
                                                                <input type="text" class="form-control" name="task[]" placeholder="Task" />
                                                            </div>
                                                            <div class="col-xs-3 dateContainer">
                                                                <div class="input-group input-append date" id="dueDatePicker">

                                                                    <input type="text" class="form-control input-group-addon" name="dueDate[]" placeholder="Due date" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>

                                                        <!-- The template for adding new field -->
                                                        <div class="form-group hide" id="taskTemplate">
                                                            <div class="col-xs-3 col-xs-offset-1">
                                                                <input type="text" class="form-control" name="task[]" placeholder="Task" />
                                                            </div>
                                                            <div class="col-xs-3 dateContainer">
                                                                <div class="input-group input-append date">

                                                                    <input type="text" class="form-control input-group-addon" name="dueDate[]" placeholder="Due date" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-5 col-xs-offset-1">
                                                                <button type="submit" class="btn btn-default">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                     </div>

                                            </section>

                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                            <div class="space15"></div>

                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6">


                        </div>
                        <div class="col-md-2"></div>

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
                                              <th>Title</th>
                                                 <th>Date</th>
                                                 <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($viewGovtHoliday as $value)
                                               @if($value->holiday_title!=null)
                                                        <tr class="">

                                                         <td>{{$value->holiday_title}}</td>
                                                         <td>{{ date('d-M-Y', strtotime($value->holiday_date))}}</td>
                                                         <td>
                                                           <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/exam/edit/"><i class="fa fa-edit"></i> </a>
                                                           <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/exam/delete/ " ><i class="fa  fa-trash-o"></i></a>

                                                         </td>

                                                        </tr>
                                                        @endif
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
