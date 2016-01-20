@extends('layouts.submaster')
@section('title')
 Students
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('/')}}/css/styledata.css">
    <script src="{{URL::to('/')}}/js/indexdata.js"></script>
@stop

@section('body')
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Editable Table
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
                                                Add New Student <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        @if(Session::get('data'))
                                            <div class="alert alert-dismissible alert-info">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong> <h3>{{Session::get('data')}}</h3></strong>
                                            </div>
                                        @endif
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#">Print</a></li>
                                                <li><a href="#">Save as PDF</a></li>
                                                <li><a href="#">Export to Excel</a></li>
                                            </ul>
                                        </div>
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Student Admission Form
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                                                </header>
                                                <div class="panel-body">
                                                    {!! Form::open(array('id'=>'signupFormt','class'=>'cmxform form-horizontal','files'=>'true')) !!}
                                                    <div class="form" >
                                                            <div class="form-group ">
                                                                <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="firstname" name="firstname" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="lastname" name="lastname" type="text" />
                                                                </div>
                                                            </div>
                                                        <div class="form-group">
                                                            <label for="deth_of_birth" class="control-label col-lg-3">Date of Birth</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control form-control-inline input-medium default-date-picker" name="deth_of_birth"  size="16" type="text" value="" />
                                                                <span class="help-block">Select date</span>
                                                            </div>
                                                        </div>
                                                            <div class="form-group ">
                                                                <label for="guardian_name" class="control-label col-lg-3">Guardian Name</label>
                                                                <div class="col-lg-6">
                                                                    <select class="form-control input-sm m-bot15" id="guardian_name" name="guardian_name" type="text">
                                                                        <option selected="selected">Select a Guardian Name</option>

                                                                        @foreach($parents as $r=>$t)
                                                                            <option value="{{$t}}">{{$r}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="gender" class="control-label col-lg-3">Gender</label>
                                                                <div class="col-lg-6">
                                                                    <select class="form-control input-sm m-bot15" id="gender" name="gender" type="text">
                                                                        <option selected>Select a Gender</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="religion " class="control-label col-lg-3">Religion </label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="religion" name="religion" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="address" class="control-label col-lg-3">Address</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="address" name="address" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="class" class="control-label col-lg-3">Class</label>
                                                                <div class="col-lg-6">
                                                                    <select class="form-control input-sm m-bot15 class"  name="class" type="text">
                                                                        <option selected="selected">Select Class</option>
                                                                        @foreach($class as $r=>$t)
                                                                            <option value="{{$t}}">{{$r}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="section" class="control-label col-lg-3">Section</label>
                                                                <div class="col-lg-6">
                                                                    <select class="form-control input-sm m-bot15 sectionid" id="" name="section" type="text">
                                                                        <option selected>Select a Section</option>

                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="roll" class="control-label col-lg-3">Roll</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="roll" name="roll" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="route_name" class="control-label col-lg-3">Route Name</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="route_name" name="route_name" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="transport_rent" class="control-label col-lg-3">Transport Rent</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="transport_rent" name="transport_rent" type="text" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="username" class="control-label col-lg-3">Username</label>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control " id="username" name="username" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="password" class="control-label col-lg-3">Password</label>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control " id="password" name="password" type="password" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="email" class="control-label col-lg-3">Email</label>
                                                                <div class="col-lg-6">
                                                                    <input class="form-control " id="email" name="email" type="email" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="phone" class="control-label col-lg-3">Phone</label>
                                                                <div class="col-lg-6">
                                                                    <input class=" form-control" id="phone" name="phone" type="text" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label for="agree" class="control-label col-lg-3 col-sm-3">Agree to Our Policy</label>
                                                                <div class="col-lg-6 col-sm-9">
                                                                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label for="newsletter" class="control-label col-lg-3 col-sm-3">Receive the Newsletter</label>
                                                                <div class="col-lg-6 col-sm-9">
                                                                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter" />
                                                                </div>
                                                            </div>
                                                             <div class="form-group last">
                                <label class="control-label col-md-3">Image Upload</label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" name="image" class="default" />
                                                   </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                    <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                                </div>
                            </div>
                                                            <div class="form-group">
                                                                <div class="col-lg-offset-3 col-lg-6">
                                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                                    <button class="btn btn-default" type="button">Cancel</button>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    {!!Form::close()!!}

                                                </div>

                                            </section>

                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                            <div class="space15"></div>
                            
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">
                                <form style="" class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-6">
                                            <select type="search" class="form-control select-table-filter " data-table="order-table">
                                                <option value="">Reset</option>
                                                @foreach($class as $r=>$t)
                                                    <option value="{{$r}}">{{$r}}</option>
                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                    </div>
                </section>

                <section class="panel">
                    <!-- page start-->

                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    ALL Section Information
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa-sort-desc"></a>
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
                                        <table class="table table-striped table-hover table-bordered order-table" id="editable-sample">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Name <i class="fa-caret-up"></i></th>

                                                <th>Roll</th>
                                                <th>Phone</th>
                                                <th>Photo</th>
                                                <th>class</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $c)
                                                <tr class="">
                                                    <td>{{$c->id}}</td>
                                                    <td> {{$c->name}}</td>
                                                    <td> {{$c->roll}}</td>
                                                    <td> {{$c->phone}}</td>

                                                    <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/{{$c->image}} "></td>
                                                    <td> {{$c->class_name}}</td>
                                                    <td>
                                                        <a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/student/details/{{$c->id}}" ><i class="fa fa-eye"></i> </a>
                                                        <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/student/edit/{{$c->id}}"><i class="fa fa-edit"></i> </a>
                                                        <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/student/delete/{{$c->st_id}}" ><i class="fa  fa-trash-o"></i></a>
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
            </div>
        </div>
        <!-- page end-->
        

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
       