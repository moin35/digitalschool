@extends('layouts.submaster')
@section('title')
    Current Month All Student Report
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
    <div class="col-md-1"> 

</div>
  <div class="col-md-8"> 
<div class="list-group">
<?php  
foreach ($sylhethana as $key => $value) {
    $dis=$value->thana_or_upazilla;
    /*********** Dhaka District Percentage Start*******/
$teac5 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code','tbl_attendence.type','tbl_attendence.uid')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_instituate.thana','=',$value->thana_or_upazilla)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',0)
            ->count();
            //return $teac1;
$teac6 = DB::table('tbl_attendence')
            ->Join('tbl_instituate', 'tbl_attendence.institute_code', '=', 'tbl_instituate.institute_code')
            ->select('tbl_instituate.division','tbl_instituate.url','tbl_attendence.status','tbl_attendence.institute_code')
            ->where( 'tbl_instituate.division','=',7)
            ->where( 'tbl_instituate.thana','=',$value->thana_or_upazilla)
            ->where( 'tbl_attendence.type','=','Teacher')
            ->where('tbl_attendence.created_at','LIKE',"%$m%")
            ->where( 'tbl_attendence.status','=',1)
            ->count('tbl_attendence.institute_code');
            //print_r($users);
            $sumteacher= $teac5+$teac6;
            $barisaltotal=(($sumteacher/$allteacherworkday)*100);
            $link=URL::to('admin/institute/registration')."/".$dis;
            
            echo "<li class='list-group-item'>"."
            <a href='$link' class='list-group-item list-group-item-success'>"
            .$dis.
            "<span class='label label-default label-pill pull-xs-right' style='float:right;'>"
            .sprintf("%.2f",$barisaltotal)."%".
            "</span>"
            ."</a>"
            ."</li>";
/*********** Dhaka District Percentage End*******/
 
}
?>
</div>
</div>
  <div class="col-md-2"> 

</div>
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
