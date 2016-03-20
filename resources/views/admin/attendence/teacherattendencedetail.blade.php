@extends('layouts.submaster')
@section('title')
    Teacher Attdence Detail
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/progressbar/css/style.css">
    <script src="{{URL::to('/')}}/js/indexdata.js"></script>
    <style>
        .hideable { display:none }
    </style>

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body profile-information">
                    <center> <h3> Attdence Information</h3> </center>
                    <div class="col-md-6" style="float:left">
<h4><?php echo date('Y-M');?>,Attendence : {{$percent}} %</h4>
    
</div><div class="col-md-6" style="float:right" align="right">
 <h4>   Absence : <?php echo (100-$percent)."%" ;?></h4>
</div>
<div class="progress-wrap progress" data-progress-percent="{{$percent}}">
&nbsp;<p style="color:white;"></p>
<div class="progress-bar progress" style="float:left;color:white;">

</div>
</div>
                    <div class="col-md-6" style="float:left">
<h4><?php echo date('Y');?>,Attendence : {{$year}} %</h4>
    
</div><div class="col-md-6" style="float:right" align="right">
 <h4>   Absence : <?php echo (100-$year)."%" ;?></h4>
</div>
<div class="progress-wrap1 progress1" data-progress-percent1="{{$year}}">
&nbsp;<p style="color:white;"></p>
<div class="progress-bar1 progress1" style="float:left;color:white;">

</div>
</div>

                    <div class="col-md-3">
                        <div class="profile-pic text-center">
                            <img src="{{URL::to('/')}}/images/{{$teacher->image}}"  class="img-rounded"  alt=""/>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-desk">
                            <h1>{{$teacher->name}}</h1>
                            <strong class="btn btn-primary">Teacher ID: {{$teacher->teacher_id}}</strong>
                            <span class="text-muted"></span><br>
                            <p style="font-size: 20px;">
                              
                               <strong>Designation:</strong>  {{$teacher->designation}}<br>
                                <strong>Gender:</strong>  {{$teacher->gender}}<br>
                                <strong>Date Of Birth:</strong>  {{$teacher->birth_date}}<br>
                                <strong>Religion :</strong>    {{$teacher->religion}}<br>
                                <strong>Phone:</strong>  {{$teacher->phone}}<br>
                                <strong>Email:</strong>   {{$teacher->email}}
                            </p>
                            <br>
                            <label><strong>Address:</strong></label>
                            <p>
                                {{$teacher->address}}
                            </p>
                            <br>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-statistics">


                            <h1><p style="font-size: 15px">*** View Information ***</p>

                                <p>Today: <?php echo date('Y-M-d');?> Late: {{$stat}}</p><br>
                               Phone: {{App\Parents::where('guradian_id','=',$teacher->guardian_id)->pluck('phone')}} </h1>

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
    <section class="panel"> 
    <div class="panel-body profile-information">
    <h3>Current Month Attdence Report</h3>
      <table class="resnponsive table-bordered">
    <thead>
      <tr>
       <th>#</th>
      
  @foreach($pre as $q => $g)
        <th style="padding:1.5px;">
           &nbsp;&nbsp;{{$g}}
        </th>
           @endforeach
      </tr>
    </thead>
    <tbody>
    <tr>
     <th><?php echo date("F"); ?></th>
           @foreach($day as $q => $v)
        @if(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='1')
        <td style="height:50px;float:center;"><span class="label label-success label-mini" >&nbsp;&nbsp;P</span></td>
        @elseif(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='0')
        <td style="height:50px; float:center;"><span class="label label-success label-mini" >&nbsp;&nbsp;P</span></td>
        @elseif(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='2')
        <td style="height:50px; float:center;"><span class="label label-danger label-mini" >&nbsp;&nbsp;A</span></td>
        @else
        <td style="background-color:white;color:black; float:center;height:50px;">&nbsp;&nbsp;B</td>
         @endif
           @endforeach
      </tr>
    </tbody>
  </table>
  </div>
  </section>
    <!-- page end-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{URL::to('/')}}/progressbar/js/index.js"></script>
@stop
