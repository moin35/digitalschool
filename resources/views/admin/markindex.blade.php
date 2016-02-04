@extends('layouts.submaster')
@section('title')
Mark
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
               Mark
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
                                <a class="btn btn-primary" href="{{URL::to('mark/add')}}" >
                                    Add Mark  <i class="fa fa-plus"></i>
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

                                            <select type="search" class="form-control select-table-filter" data-table="order-table">
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


                                <section class="panel">
                                     <!-- page start-->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel" >




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
                                                           <th>Photo</th>
                                                           <th>StudentName <i class="fa-caret-up"></i></th>
                                                           <th>Phone</th>
                                                           <th>Roll</th>
                                                          <th>Class</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                     @foreach($allStudetResult as $c)
                                                        <tr class="">
                                                          <td>{{$c->id}}</td>
                                                          <td><img src="{{URL::to('/')}}/images/{{$c->image}}" width="35px" height="35px" class="img-rounded" alt=""></td>
                                                          <td> {{$c->student_name}}</td>
                                                          <td><a  href="a url">{{$c->phone}}</a></td>
                                                          <td><a  href="a url">{{$c->roll}}</a></td>
                                                          <td><a  href="a url">{{$c->class_name}}</a></td>
                                                            <td>
                                                                <a class="btn btn-round btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/mark/view/{{$c->roll}}/{{$c->class_id}}"><i class="fa fa-eye"></i> </a>

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
        </section>
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
