@extends('layouts.submaster')
@section('title')
 Grade
@stop
@section('head')
<script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
<script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
<link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
<link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">
  <script src="{{URL::to('/')}}/js/indexdata.js"></script>
  <style>
  .hideable { display:none }
  </style>

@stop

@section('body')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
             Grade
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
                                  Add Grade  <i class="fa fa-plus"></i>
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
                                               Grade Information Add
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                            </header>
                                            <div class="panel-body">
                                                {!!Form::open(array('class'=>'cmxform form-horizontal')) !!}
                                                <section class="panel">

                                                    <div class="panel-body">

                                                        <br><br>
                                                        <div class="form">

                                                            <div class="cmxform form-horizontal " id="signupFormt1">

                                                                <div class="form-group ">
                                                                    <label for="icode" class="control-label col-lg-3">Grade Name</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control " name="GradeName" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="institute_name" class="control-label col-lg-3">Grade Point</label>
                                                                    <div class="col-lg-6">
                                                                        <input class=" form-control"  name="GradePoint" type="text" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="institute_name" class="control-label col-lg-3">Mark From</label>
                                                                    <div class="col-lg-6">
                                                                        <input class=" form-control"  name="MarkFrom" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="institute_name" class="control-label col-lg-3">Mark Upto</label>
                                                                    <div class="col-lg-6">
                                                                        <input class=" form-control"  name="MarkUpto" type="text" />
                                                                    </div>
                                                                </div>

                                                                 <div class="form-group">
                                                                 <label class="col-sm-3 control-label">Note</label>
                                                                 <div class="col-sm-6">
                                                                     <textarea class="form-control" name="MarkNote" rows="6"></textarea>
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
                                    <th>Grade Name <i class="fa-caret-up"></i></th>
                                    <th>Grade Point</th>
                                     <th>Mark From</th>
                                    <th>Mark Upto</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($allGrade as $c)
                                <tr class="">
                                    <td>{{$c->id}}</td>
                                    <td> {{$c->grade_name}}</td>
                                    <td> {{$c->grade_point}}</td>
                                    <td> {{$c->mark_form}}</td>
                                    <td class="center">{{$c->mark_upto}}</td>
                                    <td><a  href="a url">{{$c->note}}</a></td>
                                    <td>

                                        <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/grade/edit/{{$c->grade_id}}"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-round btn-danger tooltips" title=""  data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/grade/delete/{{$c->grade_id}}" ><i class="fa  fa-trash-o"></i></a>
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
</div>
<!-- page end-->

<script>
$(function() {
    $("#sel1").on("change",function() {
       $(".hideable").hide();
       var id = "#test"+(this.selectedIndex+1);
       $(id).show();
    }).change();
});

</script>
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
