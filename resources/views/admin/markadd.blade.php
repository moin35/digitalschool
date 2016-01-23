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

                              @if(Session::get('data'))
                              <div class="bs-example">
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>{{Session::get('data')}}</strong>.
    </div>
</div>

    @endif
                        </div>

                    </div>
                    <div class="space15"></div>

                </div>

     <div class="col-md-3"></div>
               <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">

                            {!!Form::open()!!}
                            
                                  <div class="form-group">
                                      <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                          Exam                                </label>
                                      <div class="col-sm-6">

                                          <select name="examName" class="form-control select-table-filter" data-table="order-table">
                                              <option value="">Reset</option>
                                              @foreach($examName as $r=>$t)
                                                  <option value="{{$r}}">{{$r}}</option>
                                              @endforeach
                                              <select>

                                      </div>
                                  </div>
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-6">

                                            <select  class="form-control select-table-filter" name="classid" id="classid" >
                                                <option value="">Reset</option>
                                                @foreach($allclass as $r=>$t)
                                                    <option value="{{$t}}">{{$r}}</option>
                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Subject                                </label>
                                        <div class="col-sm-6">

                                            <select  class="form-control select-table-filter" name="subject" id="subject_code">
                                                  <option  selected="selected">First Choose Class</option>
                                                <select>

                                        </div>
                                    </div>
                                    <center>

                                      <button class="btn btn-primary" type="submit">    Mark  <i class="fa fa-plus"></i></button>

                                     </center>
                                {!!Form::close()!!}
                            </div>
                        </div>

                        <div class="col-md-3"></div>
            </div>
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
