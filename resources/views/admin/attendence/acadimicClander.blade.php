@extends('layouts.submaster')
@section('title')
Academic Calendar
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
      <link href="{{URL::to('/')}}/multiinputfield/multiselect.css" rel="stylesheet" />

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Academic Calendar
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div ng-app="app" ng-controller="TestCtrl as test">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a class="btn btn-primary" ng-click="test.showBoxOne = !test.showBoxOne" >
                                         Academic Weekend <i class="fa fa-plus"></i>
                                    </a>
                                </div>


                                @if(Session::get('data'))
                                    <div class="bs-example">
                                        <div class="alert alert-success fade in">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            <strong>{{Session::get('data')}}</strong>.
                                        </div>
                                    </div>

                                @endif
                                <div class="btn-group pull-right">
                                  <div class="btn-group">
                                    <a class="btn btn-primary" ng-click="test.holyday = !test.holyday" >
                                Academic Holyday <i class="fa fa-plus"></i>
                                    </a>
                                    </div>
                                </div>
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                               Academic Weekend
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                                </header>
                                                <div class="panel-body">

                                                    {!!Form::open(array('class'=>'cmxform form-horizontal')) !!}
                                                    <section class="panel">
                                                        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                                                            <strong> Sucsess.</strong>
                                                        </div>
                                                        <div class="panel-body">

                                                            <br><br>
                                                            <div class="form">
                                                                <div class="cmxform form-horizontal">
                                                                  <div class="form-group ">
                                                                                     <label for="examname" class="control-label col-lg-3">Title</label>
                                                                                     <div class="col-lg-6">
                                                                                         <input class="form-control" id="feetype" name="title" type="text" />
                                                                                     </div>
                                                                                 </div>
                                                                                 <div class="form-group">
                                                                                   <label for="classesID" class="control-label col-lg-3">
                                                                                     Year                               </label>

                                                                               <div class="col-md-6">
                                                                                 <select name="selectYear" style="width:auto;" class="form-control selectWidth">
                                 @for ($i = 2000; $i <= 2030; $i++)
                                 <option class="">{{$i}}</option>
                                 @endfor
                             </select>
                                                                               </div>
                                                                             </div>


        <div class="form-group">
     <label class="control-label col-lg-3">Day</label>
     <div class="col-md-6">
    <select name="demoSel[]" id="demoSel" size="4" class="form-control" multiple>
      <option value="Sat">Sat</option>
      <option value="Sun" >Sun</option>
      <option value="Mon" >Mon</option>
      <option value="Tue" >Tue</option>
      <option value="Web" >Web</option>
      <option value="Thu" >Thu</option>
      <option value="Fri" >Fri</option>
           </select>

           <textarea name="display" id="display" placeholder="view select list value(s) onchange" name="day" cols="20" rows="4" readonly></textarea>
                           </div>
                              </div>
                          <!--    <div class="form-group ">
                                                 <label for="examname" class="control-label col-lg-3">HolyDay</label>
                                                 <div class="col-lg-6">
                                                   <div class="form-group form-group-multiple-selects col-lg-6">
                                                   <div class="input-group input-group-multiple-select col-xs-12">
                                                           <select class="form-control" name="values[]">
                                                               <option value="">Select one</option>
                                                               <option value="1">Option 1</option>
                                                               <option value="2">Option 2</option>
                                                               <option value="3">Option 3</option>
                                                               <option value="4">Option 4</option>
                                                           </select>
                                                     <span class="input-group-addon input-group-addon-remove">
                                                       <span class="glyphicon glyphicon-remove"></span>
                                                     </span>
                                                   </div>
                                                 </div>
                                                 </div>
                                             </div>


                                                                 <div class="form-group">
                                                                                     <label class="col-sm-3 control-label">Note</label>
                                                                                     <div class="col-sm-6">
                                                                                         <textarea class="form-control" id="note" name="note" rows="6"></textarea>
                                                                                     </div>
                                                                                 </div>-->


                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-3 col-lg-6">
                                                                           <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Academic Calendar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    {!!Form::close()!!}

                                                </div>

                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!--holyday add -->
                            <div class="box-one" ng-show="test.holyday">
                            <div class="row">
                            <div class="col-sm-12">
                            <section class="panel">
                            <header class="panel-heading">
                          Academic Holyday
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                            </header>
                            <div class="panel-body">
  {!!Form::open(array('class'=>'cmxform form-horizontal','id'=>'taskForm','route'=>'postholyday')) !!}
                                <form id="taskForm" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Task(s)</label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" name="task[]" placeholder="Task" />
                                        </div>
                                        <div class="col-xs-3 dateContainer">
                                            <div class="input-group input-append date" id="dueDatePicker">

                                                <input type="text" class="form-control input-group-addon" name="dueDate[]" placeholder="Due date" />
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <!-- The template for adding new field -->
                                    <div class="form-group hide" id="taskTemplate">
                                        <div class="col-xs-3 col-xs-offset-1">
                                            <input type="text" class="form-control" name="task[]" placeholder="Task" />
                                        </div>
                                        <div class="col-xs-3 dateContainer">
                                            <div class="input-group input-append date">

                                                <input type="text" class="form-control input-group-addon" name="dueDate[]" placeholder="Due date" />
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-5 col-xs-offset-1">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </form>


                            </div>

                            </section>

                            </div>
                            </div>
                            </div>
                            <!---holyday add end -->

                        </div>
                        <div class="space15"></div>

                    </div>


                </div>
            </section>

            <section class="panel">
                <!-- page start-->

                <div class="row">

                <div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
                          Academic Holyday
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($academicHoliday as $v)
                                <tr>

                                    <td>{{$v->holiday_title}}</td>
                                    <td>{{$v->holiday_date}}</td>
                                    <td>Delete</td>


                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>

                    </section>
                </div>
                <div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Week Holiday Table
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-cog"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                            <table class="table table-striped table-hover table-bordered" id="dualeditable">
                                <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Days</th>
                                      <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($weekend as $vw)
                                <tr>

                                    <td>{{$vw->title}}</td>
                                    <td>{{$vw->year}}</td>
                                    <td>{{$vw->weekendday}}</td>
                                    <td>Delete</td>


                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </section>
                </div>
             <!--
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                ALL Class Information
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

                                        </div>
                                    </div>
                                    <div class="space15"></div>

                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>#Account Id</th>
                                            <th>Fee Type <i class="fa-caret-up"></i></th>

                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tbody></tbody>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </section>
                    </div>
                </div>-->
                <!-- page end-->

            </section>
        </div>
        </section>

    </div>
    </div>
    <!-- page end-->
<script>
// arguments: reference to select list, callback function (optional)
function getSelectedOptions(sel, fn) {
    var opts = [], opt;

    // loop through options in select list
    for (var i=0, len=sel.options.length; i<len; i++) {
        opt = sel.options[i];

        // check if selected
        if ( opt.selected ) {
            // add to array of option elements to return from this function
            opts.push(opt);

            // invoke optional callback function if provided
            if (fn) {
                fn(opt);
            }
        }
    }

    // return array containing references to selected option elements
    return opts;
}
// example callback function (selected options passed one by one)
function callback(opt) {
    // display in textarea for this example
    var display = document.getElementById('display');
    display.innerHTML += opt.value + ', ';

    // can access properties of opt, such as...
    //alert( opt.value )
    //alert( opt.text )
    //alert( opt.form )
}
// anonymous function onchange for select list with id demoSel
document.getElementById('demoSel').onchange = function(e) {
    // get reference to display textarea
    var display = document.getElementById('display');
    display.innerHTML = ''; // reset

    // callback fn handles selected options
    getSelectedOptions(this, callback);

    // remove ', ' at end of string
    var str = display.innerHTML.slice(0, -2);
    display.innerHTML = str;
};
</script>

    <script>
        function TestCtrl() {
            var self = this;
            self.showBoxOne = false;
            self.showBoxTwo = false;
        }

        angular.module('app', ['ngAnimate'])
                .controller('TestCtrl', TestCtrl)
    </script>


@stop
