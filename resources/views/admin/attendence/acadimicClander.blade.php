@extends('layouts.submaster')
@section('title')
Academic Calendar
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
Add Academic Calendar
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
Add Academic Calendar <i class="fa fa-plus"></i>
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
Academic Calendar Add
<span class="tools pull-right">
<a href="javascript:;" class="fa fa-chevron-down"></a>
<a href="javascript:;" class="fa fa-cog"></a>
<a href="javascript:;" class="fa fa-times"></a>
</span>
</header>
<div class="panel-body">

{!!Form::open(array('class'=>'cmxform form-horizontal')) !!}
<section class="panel">
<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
<strong> Sucsess.</strong>
</div>
<div class="panel-body">

<br><br>
<div class="form">
<div class="cmxform form-horizontal">
<div class="form-group ">
<label for="examname" class="control-label col-lg-3">Title</label>
<div class="col-lg-6">
<input class="form-control" id="feetype" name="title" type="text" />
</div>
</div>
<div class="form-group">
<label for="classesID" class="control-label col-lg-3">
Year                               </label>

<div class="col-md-6">
<select name="selectYear" style="width:auto;" class="form-control selectWidth">
@for ($i = 2000; $i <= 2030; $i++)
<option class="">{{$i}}</option>
@endfor
</select>
</div>
</div>


<div class="form-group">
<label  class="control-label col-lg-3">Day</label>
<div class="col-lg-6">

<select name="ascuisines" id="ascuisines" multiple=""  class="form-control selectWidth" tabindex="-1" required="" aria-required="true">
<option value="" disable=""></option>
<option value="Sat">Sat</option>
<option value="Sun" >Sun</option>
<option value="Mon" >Mon</option>
<option value="Tue" >Tue</option>
<option value="Web" >Web</option>
<option value="Thu" >Thu</option>
<option value="Fri" >Fri</option>
</select>
<input type="text" id="getcuisines" class="form-control"  name="e9"/>
</div>
</div>
<div class="form-group">
<label  class="control-label col-lg-3">HollyDay</label>
<div class="col-lg-6">

<select name="ascuisines" id="holyascuisines" multiple=""  class="form-control selectWidth" tabindex="-1" required="" aria-required="true">
<option value="" disable=""></option>
<option value="Sat">Sat</option>
<option value="Sun" >Sun</option>
<option value="Mon" >Mon</option>
<option value="Tue" >Tue</option>
<option value="Web" >Web</option>
<option value="Thu" >Thu</option>
<option value="Fri" >Fri</option>
</select>
<input type="text" id="holygetcuisines" class="form-control"  name="holyday"/>

</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Note</label>
<div class="col-sm-6">
<textarea class="form-control" id="note" name="note" rows="6"></textarea>
</div>
</div>


<div class="form-group">
<div class="col-lg-offset-3 col-lg-6">
<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Academic Calendar</button>
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
<th>#Account Id</th>
<th>Fee Type <i class="fa-caret-up"></i></th>

<th>Note</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tbody></tbody>
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
</script>


@stop
