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
  table a:link {
  	color: #666;
  	font-weight: bold;
  	text-decoration: none;
  }

  table a:visited {
  	color: #999999;
  	font-weight: bold;
  	text-decoration: none;
  }

  table a:active,
  table a:hover {
  	color: #bd5a35;
  	text-decoration: underline;
  }

  table {
  	font-family: Arial, Helvetica, sans-serif;
  	color: #666;
  	font-size: 11px;
  	text-shadow: 1px 1px 0px #fff;
  	background: #eaebec;
  	margin-left: -15px;
  	border: #ccc 1px solid;
  	-moz-border-radius: 3px;
  	-webkit-border-radius: 3px;
  	border-radius: 3px;
  	-moz-box-shadow: 0 1px 2px #d1d1d1;
  	-webkit-box-shadow: 0 1px 2px #d1d1d1;
  	box-shadow: 0 1px 2px #d1d1d1;
  }

  table th {
  	padding: 10px 15px 12px 15px;
  	border-top: 1px solid #fafafa;
  	border-bottom: 1px solid #e0e0e0;
  	background: #fffcf5;
  	background: -webkit-gradient(linear, left top, left bottom, from(#fffcf5), to(#fffcf5));
  	background: -moz-linear-gradient(top, #fffcf5, #fffcf5);
  }

  table th:first-child {
  	text-align: left;
  	padding-left: 20px;
  }

  table tr:first-child th:first-child {
  	-moz-border-radius-topleft: 3px;
  	-webkit-border-top-left-radius: 3px;
  	border-top-left-radius: 3px;
  }

  table tr:first-child th:last-child {
  	-moz-border-radius-topright: 3px;
  	-webkit-border-top-right-radius: 3px;
  	border-top-right-radius: 3px;
  }

  table tr {
  	text-align: center;
  	padding-left: 0px;
  }

  table td:first-child {
  	text-align: left;
  	padding-left: 10px;
  	border-left: 0;
  }

  table td {
  	padding: 9px;
  	border-top: 1px solid #ffffff;
  	border-bottom: 1px solid #e0e0e0;
  	border-left: 1px solid #e0e0e0;
  	background: #fffcf5;
  	background: -webkit-gradient(linear, left top, left bottom, from(#fffcf5), to(#fffcf5));
  	background: -moz-linear-gradient(top, #fffcf5, #fffcf5);
  }

  table tr.even td {
  	background: #fffcf5;
  	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#fffcf5));
  	background: -moz-linear-gradient(top, #f8f8f8, #fffcf5);
  }

  table tr:last-child td {
  	border-bottom: 0;
  }

  table tr:last-child td:first-child {
  	-moz-border-radius-bottomleft: 3px;
  	-webkit-border-bottom-left-radius: 3px;
  	border-bottom-left-radius: 3px;
  }

  table tr:last-child td:last-child {
  	-moz-border-radius-bottomright: 3px;
  	-webkit-border-bottom-right-radius: 3px;
  	border-bottom-right-radius: 3px;
  }

  table tr:hover td {
  	background: #fffcf5;
  	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  	background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
  }
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


<table class="table-responsive" cellspacing='0'>
	<!-- cellspacing='0' is important, must stay -->

	<thead>
		<tr>
			<th>Takimlar</th>
			<th>O</th>
			<th>G</th>
			<th>B</th>
			<th>M</th>
			<th>Av</th>
			<th>P</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Besiktas</td>
			<td>16</td>
			<td>12</td>
			<td>2</td>
			<td>2</td>
			<td>19</td>
			<td>38</td>
		</tr>

		<tr class="even">
			<td>Fenerbahce</td>
			<td>16</td>
			<td>11</td>
			<td>4</td>
			<td>1</td>
			<td>13</td>
			<td>37</td>
		</tr>

		<tr>
			<td>Galatasaray</td>
			<td>16</td>
			<td>8</td>
			<td>5</td>
			<td>3</td>
			<td>15</td>
			<td>29</td>
		</tr>

		<tr class="even">
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

		<tr>
			<td>Kasimpasa</td>
			<td>16</td>
			<td>8</td>
			<td>5</td>
			<td>3</td>
			<td>9</td>
			<td>28</td>
		</tr>

		<tr class="even">
			<td>Akhisar Belediye</td>
			<td>16</td>
			<td>8</td>
			<td>4</td>
			<td>4</td>
			<td>7</td>
			<td>28</td>
		</tr>

		<tr>
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

		<tr>
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

		<tr>
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

		<tr>
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

		<tr>
			<td>Basaksehir</td>
			<td>16</td>
			<td>9</td>
			<td>2</td>
			<td>5</td>
			<td>9</td>
			<td>29</td>
		</tr>

	</tbody>
	<!-- Table Body -->

</table>

                  </div>

              </section>


</div>
<!-- page end-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="{{URL::to('/')}}/goalProgress/js/index.js"></script>
@stop
