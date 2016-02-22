@extends('layouts.submaster')
@section('title')
Section
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
               Section
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
                                    Add Section  <i class="fa fa-plus"></i>
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
                                               Section Information Add
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                            </header>
                                            <div class="panel-body">
                                                {!!Form::open(array('id'=>'sectioninfo','class'=>'cmxform form-horizontal')) !!}
                                                <section class="panel">

                                                    <div class="panel-body">

                                                        <br><br>
                                                        <div class="form">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8" >
                                                                <div class="row">
                                                                    <div class="list-group-item list-group-item-warning">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div style="" class="form-horizontal" >
                                                                                <div class="form-group">
                                                                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                        Teacher                             </label><br>
                                                                                    <div class="col-sm-6">

                                                                                        <select name='teacherName'   class="form-control"  >
                                                                                            <option  selected="selected" >Choose a Class Teacher</option>
                                                                                            @foreach($teacher as $r=>$t)
                                                                                            <option value="{{$t}}">{{$r}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                 <div class="list-group-item list-group-item-warning">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div style="" class="form-horizontal" >
                                                                                <div class="form-group">
                                                                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                       Class                            </label><br>
                                                                                    <div class="col-sm-6">

                                                                                        <select name='className'   class="form-control"  >
                                                                                            <option  selected="selected" >Choose Class</option>
                                                                                            @foreach($allclass as $r=>$t)
                                                                                            <option value="{{$t}}">{{$r}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="cmxform form-horizontal " id="signupFormt1">

                                                                <div class="form-group ">
                                                                    <label for="icode" class="control-label col-lg-3">Section</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control " name="SectionName" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="institute_name" class="control-label col-lg-3">Category</label>
                                                                    <div class="col-lg-6">
                                                                        <input class=" form-control"  name="sectioncategory" type="text" />
                                                                    </div>
                                                                </div>


 <div class="form-group">
                                <label class="col-sm-3 control-label">Note</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="sectionNote" rows="6"></textarea>
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
                                                @foreach($allclass as $r=>$t)
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
                                    <th>Class <i class="fa-caret-up"></i></th>
                                    <th>Section</th>
                                     <th>Section Category</th>
                                    <th>Teacher</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($section as $c)
                                <tr class="">
                                    <td>{{$c->section_id}}</td>
                                    <td> {{$c->class_name}}</td>
                                    <td> {{$c->section_name}}</td>
                                    <td> {{$c->section_category}}</td>
                                    <td class="center">{{$c->tearcher_name}}</td>
                                    <td><a  href="a url">{{$c->note}}</a></td>
                                    <td>
                                        <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/section/edit/{{$c->section_id}}"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/section/delete/{{$c->section_id}}" ><i class="fa  fa-trash-o"></i></a>
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
