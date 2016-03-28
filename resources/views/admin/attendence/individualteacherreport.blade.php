@extends('layouts.submaster')
@section('title')
    Teacher Atthence Detail
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
          <table class="resnponsive table-bordered">
    <thead>
    <tr>
      <th>#</th>
      <th>Date </th>
      <th>Status</th>
      <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check In &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Out &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Working Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>Late</th>
      <th>Over Time</th>


    </tr>
    </thead>
    <tbody>
  @foreach($pre as $q => $v)
      <tr>
       <th>#</th>
      
     <th style="padding:1.5px;">
     <?php echo $v;
      for ($i=$q; $i <$q ; $i++) { 
       echo $q->$v;
      }
     ?>         
        @if(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='1')
        <td style="height:50px;float:center;"><span class="label label-success label-mini" >&nbsp;&nbsp;P</span></td>
        @elseif(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='0')
        <td style="height:50px; float:center;"><span class="label label-success label-mini" >&nbsp;&nbsp;P</span></td>
        @elseif(\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('status')=='2')
        <td style="height:50px; float:center;"><span class="label label-danger label-mini" >&nbsp;&nbsp;A</span></td>
          @elseif(date('Y-m-d', strtotime(\App\InstiHolyday::where('institute_code','=',Auth::user()->institute_id)->where('holiday_date','=',"$v")->pluck('holiday_date')))==$v)
      <td style="height:50px;float:center;" class="att-bg-color"><span class="label label-warning label-mini">AH</span></td>
     @elseif(date('Y-m-d', strtotime(\App\Holyday::where('holiday_date','=',"$v")->pluck('holiday_date')))==$v)
      <td style="height:50px;float:center;" class="att-bg-color"><span class="label label-info label-mini">GH</span></td>
      @elseif($App==date('D',strtotime($v)))
     <td style="height:50px;float:center;" class="att-bg-color"><span class="label label-inverse label-mini">WE</span></td>
     @elseif($sewe==date('D',strtotime($v)))
    <td style="height:50px;float:center;" class="att-bg-color"><span class="label label-inverse label-mini">WE</span></td>
    @elseif($sewe3==date('D',strtotime($v)))
   <td style="height:50px;float:center;" class="att-bg-color"><span class="label label-inverse label-mini">WE</span></td>
    @else
        <td style="background-color:white;color:black; float:center;height:50px;">&nbsp;&nbsp;B</td>
         @endif
        </th>
        <th colspan="2">
        @if($c=\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('created_at'))
        <?php
          $a= substr($c,10);
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".date('h:i:s a', strtotime($a))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
          ?>
          @endif
        </th>
        <th>
   @if($c=\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('updated_at'))
        <?php
  $a= substr($c,10);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".date('h:i:s a', strtotime($a))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
?>
@endif
        </th>
        <th colspan="2">
          <?php 
        $c=\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('created_at');  
        $d=\App\Attendence::where('institute_code','=',Auth::user()->institute_id)->where('uid','=',$teacher->teacher_id)->where('created_at','LIKE',"%$v%")->pluck('updated_at');
$diff_seconds  = strtotime($d) - strtotime($c);
//return $diff_seconds;
$stat = floor($diff_seconds/3600).':'.floor(($diff_seconds%3600)/60).'M';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$stat;
          ?>
        </th>
        <th>ok</th>
        <th>ok</th>
  

      </tr>
          @endforeach
             @foreach($day as $q => $v)
        @endforeach
    </tbody>
  </table>

  </div>
  </section>


    <!-- page end-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{URL::to('/')}}/progressbar/js/index.js"></script>
@stop
