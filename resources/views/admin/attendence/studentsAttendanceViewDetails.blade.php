@extends('layouts.submaster')
@section('title')
Attendance Information
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


    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/goalProgress/css/style.css" />

@stop

@section('body')


<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
          Attendance Information
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

                                     <div class="skillbar clearfix " data-percent="{{$persent}}%">
                                     	<div class="skillbar-title" style="background: #27ae60;" ><span><?php echo date("F"); ?>,<b>P</b>{{$persent}}%</span> </div>
                                     	<div class="skillbar-bar" style="background: #2ecc71;"></div>
                                     	<div class="skill-bar-percent" ><b>A</b>{{(100-$persent)}}%</div>
                                     </div> <!-- End Skill Bar -->


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
<center> <h1> Attendance Information</h1></center>
<div class="table-responsive">
                            <table class="responsive">
                                <thead>
                                    <tr class="even">
                                        <th>#</th>
                                  @foreach ($day as $key => $value)
                                          <th>{{ $value}} </th>
                                    @endforeach
                                      </tr>
                                </thead>
                                        <tbody align="center">
                                            <tr>

                                            <th><?php echo date("F"); ?></th>
                                                
                                                    @foreach ($listdate as $key => $value)

                                              @if($value==date('j'))
                                              @foreach ($viewAttandence as $key => $value)
                                                 @if($value->status==0)
                                                <td class="att-bg-color"><span class="label label-success label-mini">P</span></td>
                                                @elseif($value->status==1)
                                               <td class="att-bg-color"><span class="label label-danger label-mini">A</span></td>


                                                    @else
                                                      <td class="att-bg-color"><span class="label label-primary label-mini">F</span></td>
                                                     @endif
                                                       @endforeach
                                                         @endif
                                                     @endforeach


                                    </tr>
                                                            </tbody>
                                                          </table>
                        </div>

                  </div>

              </section>


</div>
<!-- page end-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="{{URL::to('/')}}/goalProgress/js/index.js"></script>
@stop
