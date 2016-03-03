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
        </section>
        <section class="panel">
                  <div class="panel-body profile-information">
                  <center> <h1> Personal Information</h1> </center>
                     <div class="col-md-3">
                         <div class="profile-pic text-center">
                             <img src="{{URL::to('/')}}/images/{{$stdInfo->image}}"  class="img-rounded"  alt=""/>

                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="profile-desk">
                             <h1>{{$stdInfo->name}}</h1>
                             <span class="text-muted">{{$stdClass}}</span><br>
                             <label><strong>Address:</strong></label>
                             <p>
                                 {{$stdInfo->address}}
                             </p>
                             <br>
                             <a href="#" class="btn btn-primary">Roll:{{$stdInfo->roll  }}</a>
                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="profile-statistics">
                             <h1>{{$stdInfo->phone}}</h1>
                             <p>{{$stdInfo->email}}</p>
                             <h1>{{App\Parents::where('guradian_id','=',$stdInfo->guardian_id)->pluck('phone')}} </h1>
                             <p>{{$stdInfo->guardian_name}}</p>
                             <ul>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-facebook"></i>
                                     </a>
                                 </li>
                                 <li class="active">
                                     <a href="#">
                                         <i class="fa fa-twitter"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <i class="fa fa-google-plus"></i>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="profile-statistics">
                             <h1>Section:{{$stdInfo->section}}</h1>
                             <p>Religion : {{$stdInfo->religion}}</p>
                             <h1>Birth : {{$stdInfo->birth_certificate}}</h1>

                         </div>
                     </div>

                  </div>
                  <hr>
                  <div class="panel-body profile-information">
<center> <h1> Mark Information</h1></center>

              </section>

    </div>
</div>
<!-- page end-->

@stop
