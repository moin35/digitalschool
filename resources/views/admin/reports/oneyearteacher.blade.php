@extends('layouts.submaster')
@section('title')
 Last Year Teacher Report
@stop
@section('head')
@stop
@section('body')

@if(Auth::check())
@if(Auth::user()->priv==1)
<!--mini statistics start-->
<div class="row">
<div class="panel panel-default">
  <div class="panel-heading">TEACHER REPORT</div>
  <div class="panel-body">
        <a href="{{URL::to('admin/view/current/month/teacher/attdence/data')}}">
        <div class="col-md-6">
        <div class="mini-stat clearfix">
        <h4 align="center">DIVISION</h4>
            <span class="mini-stat-icon tar"><i class="fa fa-stethoscope"></i></span>
            <div class="mini-stat-info tar" style="color:white;">

                  <span>19 %</span>
            </div>
        </div>
    </div>
    </a>
    <a href="">
            <div class="col-md-6">
        <div class="mini-stat clearfix">
        <h4 align="center">DISTRICT</h4>
            <span class="mini-stat-icon tar"><i class="fa fa-stethoscope"></i></span>
            <div class="mini-stat-info tar" style="color:white;">

                  <span>19 %</span>
            </div>
        </div>
    </div>
    </a>
    <a href="">
            <div class="col-md-6">
        <div class="mini-stat clearfix">
        <h4 align="center">THANA</h4>
            <span class="mini-stat-icon tar"><i class="fa fa-stethoscope"></i></span>
            <div class="mini-stat-info tar" style="color:white;">

                  <span>19 %</span>
            </div>
        </div>
    </div>
    </a>
        <a href="">
        <div class="col-md-6">
        <div class="mini-stat clearfix">
        <h4 align="center">UNION</h4>
            <span class="mini-stat-icon tar"><i class="fa fa-stethoscope"></i></span>
            <div class="mini-stat-info tar" style="color:white;">

                  <span>19 %</span>
            </div>
        </div>
    </div>
    </a>
  </div>
</div>
</div>
<!--mini statistics start-->
    @endif
    @endif
    <script type="text/javascript">

/***********************************************
* Local Time script- (c) Dynamic Drive (http://www.dynamicdrive.com)
* Please keep this notice intact
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var weekdaystxt=["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"]

function showLocalTime(container, servermode, offsetMinutes, displayversion){
if (!document.getElementById || !document.getElementById(container)) return
this.container=document.getElementById(container)
this.displayversion=displayversion
var servertimestring=(servermode=="server-php")? '<? print date("F d, Y H:i:s", time())?>' : (servermode=="server-ssi")? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '<%= Now() %>'
this.localtime=this.serverdate=new Date(servertimestring)
this.localtime.setTime(this.serverdate.getTime()+offsetMinutes*60*1000) //add user offset to server time
this.updateTime()
this.updateContainer()
}

showLocalTime.prototype.updateTime=function(){
var thisobj=this
this.localtime.setSeconds(this.localtime.getSeconds()+1)
setTimeout(function(){thisobj.updateTime()}, 1000) //update time every second
}

showLocalTime.prototype.updateContainer=function(){
var thisobj=this
if (this.displayversion=="long")
this.container.innerHTML=this.localtime.toLocaleString()
else{
var hour=this.localtime.getHours()
var minutes=this.localtime.getMinutes()
var seconds=this.localtime.getSeconds()
var ampm=(hour>=12)? "PM" : "AM"
var dayofweek=weekdaystxt[this.localtime.getDay()]
this.container.innerHTML=formatField(hour, 1)+":"+formatField(minutes)+":"+formatField(seconds)+" "+ampm+" ("+dayofweek+")"
}
setTimeout(function(){thisobj.updateContainer()}, 1000) //update container every second
}

function formatField(num, isHour){
if (typeof isHour!="undefined"){ //if this is the hour field
var hour=(num>12)? num-12 : num
return (hour==0)? 12 : hour
}
return (num<=9)? "0"+num : num//if this is minute or sec field
}

</script>
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
@stop
