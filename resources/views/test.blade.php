@extends('layouts.submaster')
@section('title')
    Teachers
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

@stop

@section('body')
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                @if(Session::get('data'))
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> <h3>{{Session::get('data')}}</h3></strong>
                    </div>
                @endif
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div ng-app="app" ng-controller="TestCtrl as test">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a class="btn btn-primary" ng-click="test.showBoxOne = !test.showBoxOne" >
                                        Add New Teacher <i class="fa fa-plus"></i>
                                    </a>
                                </div>
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
                                                <div class="panel-body">
                                                    {!! Form::open(array('id'=>'signupTeacher','class'=>'cmxform form-horizontal','files'=>'true')) !!}
                                                    <div class="form" >


                                                        <div class="form-group last">
                                                            <label class="control-label col-md-3">Image Upload</label>
                                                            <div class="col-md-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                                                    <div class="fileupload-new thumbnail" style="width: 500px; height: 350px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" name="image" class="default" />
                                                   </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                                    </div>
                                                                </div>
                                                                <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-6">
                                                                <button class="btn btn-primary" type="submit">Save</button>
                                                                <button class="btn btn-default" type="button">Cancel</button>
                                                            </div>
                                                        </div>

                                                    </div>
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
                    <div class="col-md-3"></div>

                    <div class="col-md-3"></div>

                </div>
            </section>
        </div>
        </section>
        <div class="panel-body">
            {!! Form::open(array('id'=>'signupTeacher','class'=>'cmxform form-horizontal','files'=>'true')) !!}
            <div class="form" >


                <div class="form-group last">
                    <label class="control-label col-md-3">Image Upload</label>
                    <div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                            <div class="" style="width: 500px; height: 350px;background-image: url(images/test.jpg);">
                                <div class="form-group ">


                                        <input class="form-control " style="margin-left:90px;width: 60px;height:145px;background-color: transparent;border: 2px solid red;" id="icodes" name="icode" type="text" placeholder="ID: 1"/>
                                        <input class="form-control " style="margin-left:205px;width: 33px;height:55px;background-color: transparent;border: 2px solid red;" id="icodes" name="icode" type="text" placeholder="ID: 2"/>

                                </div>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 350px; line-height: 20px;"></div>
                            <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" name="image" class="default" />
                                                   </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                        <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                    </div>
                </div>

            </div>
            {!!Form::close()!!}

        </div>


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
@stop
