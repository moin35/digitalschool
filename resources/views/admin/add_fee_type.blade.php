@extends('layouts.submaster')
@section('title')
    Add Fee Type
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
                    Add Fee Type
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
                                        Add Fee Type <i class="fa fa-plus"></i>
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
                                                    Class Information Add
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                                </header>
                                                <div class="panel-body">

                                                    {!!Form::open(array('id'=>'myform','class'=>'cmxform form-horizontal')) !!}
                                                    <section class="panel">
                                                        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                                                            <strong> Sucsess.</strong>
                                                        </div>
                                                        <div class="panel-body">

                                                            <br><br>
                                                            <div class="form">
                                                                <div class="cmxform form-horizontal " id="signupFormt1">
                                                                    @include('admin.feeform.feeform')

                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-3 col-lg-6">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                                                            {!!link_to('#', $title='Add Fee Type', $attributes = ['id'=>'feesubmit', 'class'=>'btn btn-primary'], $secure = null)!!}
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
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Update Data</h4>
                            </div>

                            <div class="modal-body">
                                <div class="form">
                                    <div class="cmxform form-horizontal " id="signupFormt1">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                        <input type="hidden" id="id">
                                        <div class="form-group ">
                                            <label for="examname" class="control-label col-lg-3">Fee Type</label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="typeedit" name="moin" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Note</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="noteedit" name="saif" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                               </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                {!!link_to('#', $title='Update', $attributes = ['id'=>'updatefeetype', 'class'=>'btn btn-primary'], $secure = null)!!}
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <th>#Account Id</th>
                                            <th>Fee Type <i class="fa-caret-up"></i></th>

                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tbody id="datos"></tbody>
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
        <a href="#" id="try" data-link="{{URL::to('/')}}" data-token="{{ csrf_token() }}"></a>
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
@stop
@section('scripts')

    <script src="{{URL::to('/')}}/ajaxjs/script.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/ajaxjs/script2.js" type="text/javascript"></script>
@endsection