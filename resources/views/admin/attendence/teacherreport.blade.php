@extends('layouts.submaster')
@section('title')
    Teacher Attendence Report
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">


    <script src="{{URL::to('/')}}/js/indexdata.js"></script>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="{{URL::to('/')}}/filtertimedate/jquery.mtz.monthpicker.js"></script>
@stop
@section('body')
    <h1 align="center">Teacher Attendence Report</h1>
    <section class="panel">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Teacher attendence report
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
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            @if(Session::get('data'))
                                <div class="bs-example">
                                    <div class="alert alert-success fade in">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>{{Session::get('data')}}</strong>.
                                    </div>
                                </div>

                            @endif
                      <form name="clockForm">
                      <p class="btn btn-success">{{$p}}</p>
                                    <input class="btn btn-success" type="button" name="clockButton" value="Loading..." onClick="showDate()" />

                      </form>
                      <div></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Teacher Id</th>
                                   <!-- <th>Today</th>
                                    <th>Month</th>
                                    <th>Year</th> -->
                                    <th>Search</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($at as $a)
                                    <tr class="" id="tid">
                                        <td > {{$a->name}}</td>
                                        <td>{{$a->teacher_id}}</td>
                                       <!-- <td> 
                                            <input class="default-date-picker" name="date"  size="16" type="text" value="" />
                                        </td>
                                        <td class="center">
                                                <select name="month">
                                                    <option value="">Select Month</option>
                                                    <option value="01">Jan</option>
                                                </select>
                                                <select name="year">
                                                    <option value="">Select Year</option>
                                                    <option value="2016">2016</option>
                                                </select>
                                        </td>
                                        <td> 
                                           <select>
                                           <option selected="selected" value=" ">Search with year</option>
                                           <option value="2016">2016</option>
                                           </select>
                                        </td> -->
                                        <td>
                                            <a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/view/attendence/teacher/{{$a->teacher_id}}" >
                                                <div class="fa fa-check"></div>View Detail
                                            </a>
                                            <!--<a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/teachers/edit/{{$a->teacher_id}}"><i class="fa fa-edit"></i> </a>
                                            <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/teachers/delete/{{$a->teacher_id}}" ><i class="fa  fa-trash-o"></i></a>
                                            -->
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
    <!-- JAvascript view auto increment number for table start-->
    <script>
        var tables = document.getElementsByTagName('table');
        var table = tables[tables.length - 1];
        var rows = table.rows;
        for(var i = 1, td; i < rows.length; i++){
            td = document.createElement('td');
            td.appendChild(document.createTextNode(i + 0));
            rows[i].insertBefore(td, rows[i].firstChild);
        }
    </script>
    <!-- JAvascript view auto increment number for table End-->

    <script language="JavaScript">
        <!--
        function clock(){
            var time = new Date()
            var hr = time.getHours()
            var min = time.getMinutes()
            var sec = time.getSeconds()
            var ampm = " PM "
            if (hr < 12){
                ampm = " AM "
            }
            if (hr > 12){
                hr -= 12
            }
            if (hr < 10){
                hr = " " + hr
            }
            if (min < 10){
                min = "0" + min
            }
            if (sec < 10){
                sec = "0" + sec
            }
            document.clockForm.clockButton.value = hr + ":" + min + ":" + sec + ampm
            setTimeout("clock()", 1000)
        }
        function showDate(){
            var date = new Date()
            var year = date.getYear()
            if(year < 1000){
                year += 1900
            }
            var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
            alert( monthArray[date.getMonth()] + " " + date.getDate() + ", " + year)
        }
        window.onload=clock;
        //-->
    </script>
<script>
$('#demo-1').monthpicker();
$('#demo-2').monthpicker({pattern: 'mm-yyyy', 
    selectedYear: 2015,
    startYear: 1900,
    finalYear: 2212,});
    var options = {
    selectedYear: 2015,
    startYear: 2008,
    finalYear: 2018,
    openOnFocus: false // Let's now use a button to show the widget
};

$('#demo-3').monthpicker(options);

$('#demo-3').monthpicker().bind('monthpicker-change-year', function (e, year) {
    $('#demo-3').monthpicker('disableMonths', []); // (re)enables all
    if (year === '2015') {
        $('#demo-3').monthpicker('disableMonths', [1, 2, 3, 4]);
    }
    if (year === '2014') {
        $('#demo-3').monthpicker('disableMonths', [9, 10, 11, 12]);
    }
});

$('#demo-3-button').bind('click', function () {
    $('#demo-3').monthpicker('show');
});
</script>


@stop
