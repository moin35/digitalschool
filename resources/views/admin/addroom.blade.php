@extends('layouts.submaster')
@section('title')
    Add Room Number
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
                    Add Class Room & Teachers Room Information
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
                                        Add Room No & Name <i class="fa fa-plus"></i>
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
                                 @if(Session::get('warn'))
                                    <div class="bs-example">
                                        <div class="alert alert-warning fade in">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            <strong>{{Session::get('warn')}}</strong>.
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
                                                    Class & Teachers Room Information Add
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
                                                                        <label for="examname" class="control-label col-lg-3">Room Name</label>
                                                                        <div class="col-lg-6">
                                                                            <input class="form-control"  name="rname" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label for="date" class="control-label col-lg-3">Room No</label>
                                                                        <div class="col-lg-6">
                                                                            <input class="form-control"  name="rnumber" type="text" />
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Note</label>
                                                                        <div class="col-sm-6">
                                                                            <textarea class="form-control" name="note" rows="6"></textarea>
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
                                            <th>Room name </th>
                                            <th>Room Number</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($room as $c)
                                            <tr class="">

                                                <td> {{$c->room_name}}</td>
                                                <td> {{$c->room_no}}</td>
                                                <td><a  href="a url">{{$c->note}}</a></td>
                                                <td>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/exam/edit/{{$c->id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/exam/delete/{{$c->id}}" ><i class="fa  fa-trash-o"></i></a>
                                                </td>
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
    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
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
@stop
