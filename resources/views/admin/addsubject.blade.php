@extends('layouts.submaster')
@section('title')
   Subject Info
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
                    Subject Information
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
                                        Add Subject   <i class="fa fa-plus"></i>
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
                                                    Add Subject
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                                </header>
                                                <div class="panel-body">
                                                    {!!Form::open(array('id'=>'subjectinfo','class'=>'cmxform form-horizontal')) !!}
                                                    <section class="panel">

                                                        <div class="panel-body">

                                                            <br><br>
                                                            <div class="form">

                                                                <div class="cmxform form-horizontal " id="signupFormt1">

                                                                    <div class="form-group ">
                                                                        <label for="subname" class="control-label col-lg-3">Subject Name</label>
                                                                        <div class="col-lg-6">
                                                                            <input class="form-control " id="subname" name="subname" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label for="subcode" class="control-label col-lg-3">Subject Code</label>
                                                                        <div class="col-lg-6">
                                                                            <input class="form-control " id="subcode" name="subcode" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label for="subauth" class="control-label col-lg-3">Subject Author</label>
                                                                        <div class="col-lg-6">
                                                                            <input class="form-control " id="subauth" name="subauth" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label for="subteacher" class="control-label col-lg-3">Select Teacher</label>
                                                                        <div class="col-lg-6">
                                                                        <select name='subteacher' id='subteacher'   class="form-control"  >
                                                                            <option  selected="selected" >Choose Teacher</option>
                                                                            @foreach($teacher as $r=>$t)
                                                                                <option value="{{$t}}">{{$r}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                             </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="subclass" class="control-label col-lg-3">Select Class</label>
                                                                        <div class="col-lg-6">
                                                                        <select name='subclass'   class="form-control"  >
                                                                            <option  selected="selected" >Choose Class</option>
                                                                            @foreach($class as $r=>$t)
                                                                                <option value="{{$t}}">{{$r}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Note</label>
                                                                        <div class="col-sm-6">
                                                                            <textarea class="form-control" name="subnote" rows="6"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-3 col-lg-6">
                                                                            <button class="btn btn-primary" type="submit">Save</button>
                                                                            <button class="btn btn-default" type="button">Cancel</button>
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
                            <a href="javascript:;" class="fa-sort-desc"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                            </header>
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix">

                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#">Print</a></li>
                                                <li><a href="#">Save as PDF</a></li>
                                                <li><a href="#">Export to Excel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>

                                            <th>Class <i class="fa-caret-up"></i></th>
                                            <th>Subject Name</th>
                                            <th>Teacher</th>
                                            <th>Sub Author</th>
                                            <th>Subject Code</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allsubinfo as $c)
                                            <tr class="">
                                                <td>{{$c->class_name}}</td>
                                                <td> {{$c->subject_name}}</td>
                                                <td> {{$c->teacher_name}}</td>
                                                <td class="center">{{$c->sub_author}}</td>
                                                <td><a  href="a url">{{$c->subject_code}}</a></td>
                                                <td>
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/admin/edit/subject/{{$c->subject_code}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/institute/delete/" ><i class="fa  fa-trash-o"></i></a>

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
@stop
