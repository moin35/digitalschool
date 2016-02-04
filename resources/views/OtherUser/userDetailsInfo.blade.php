@extends('layouts.submaster')
@section('title')
 User Information
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
                             <img src="{{URL::to('/')}}/images/{{$userInfo->image}}"  class="img-rounded"  alt=""/>

                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="profile-desk">
                             <h1>{{$userInfo->name}}</h1>
                             <span class="text-muted"> </span><br>
                             <label><strong>Address:</strong></label>
                             <p>
                                 {{$userInfo->address}}
                             </p>
                             <br>
                             <a href="#" class="btn btn-primary">ID:{{$userInfo->uid}}</a>
                         </div>
                     </div>
                     <div class="col-md-3">
                         <div class="profile-statistics">
                             <h1>{{$userInfo->phone}}</h1>
                             <p>{{$userInfo->email}}</p><br>
                             <label>Gender:{{$userInfo->gender}}</label><br>
                             <label>Religion:{{$userInfo->religio}}</label>
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
                             <h3>Username:{{$userInfo->user_name}}</h3>
                             <p>Joining Date : {{$userInfo->join_date}}</p>
                             <h3>Birth : {{$userInfo->birth_date}}</h3>

                         </div>
                     </div>

                  </div>
                
 
              </section>

    </div>
</div>
<!-- page end-->

@stop
