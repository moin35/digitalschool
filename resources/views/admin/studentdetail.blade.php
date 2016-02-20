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
                            <img src="{{URL::to('/')}}/images/{{$individualstudent->image}}"  class="img-rounded"  alt=""/>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-desk">
                            <h1>{{$individualstudent->name}}</h1>
                            <strong class="btn btn-primary">Roll: {{$individualstudent->roll}}</strong>
                            <span class="text-muted"></span><br>
                            <p style="font-size: 20px;">
                              <strong>Class:</strong>   {{$classname}}<br>
                               <strong>Section:</strong>  {{$individualstudent->section}}<br>
                                <strong>Gender:</strong>  {{$individualstudent->gender}}<br>
                                <strong>Date Of Birth:</strong>  {{$individualstudent->birth_certificate}}<br>
                                <strong>Religion :</strong>    {{$individualstudent->religion}}<br>
                                <strong>Phone:</strong>  {{$individualstudent->phone}}<br>
                                <strong>Email:</strong>   {{$individualstudent->email}}
                            </p>
                            <br>
                            <label><strong>Address:</strong></label>
                            <p>
                                {{$individualstudent->address}}
                            </p>
                            <br>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-statistics">


                            <h1><p style="font-size: 15px">*** Guradian Information ***</p>
                                <p>Name: {{$individualstudent->guardian_name}}</p><br>
                               Phone: {{App\Parents::where('guradian_id','=',$individualstudent->guardian_id)->pluck('phone')}} </h1>

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

                </div>
                <hr>
                <div class="panel-body profile-information">

                    <div class="panel-body">

                            <div class="clearfix">

                                <div class="btn-group pull-right">

                                </div>
                            </div>
                            <div class="space15"></div>

                    </div>
            </section>

        </div>
    </div>
    <!-- page end-->

@stop
