@extends('layouts.submaster')
@section('title')
    Add Parents
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Parents
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
                                        Add Parents <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                                @if(Session::get('data'))
                                    <div class="alert alert-dismissible alert-info">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong> <h3>{{Session::get('data')}}</h3></strong>
                                    </div>
                                @endif
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Parents
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span
                                                </header>
                                                <div class="panel-body">

                                                    {!! Form::open(array('id'=>'signupFormt2','class'=>'cmxform form-horizontal')) !!}
                                                    <div class="form" >
                                                        <div class="form-group ">
                                                            <label for="gname" class="control-label col-lg-3">Guardian Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="gname" name="gname" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="father_name" class="control-label col-lg-3">Father's Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="father_name" name="father_name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="mother_name" class="control-label col-lg-3">Mother's Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="mother_name" name="mother_name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="father_profession" class="control-label col-lg-3">Father's Profession</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="father_profession" name="father_profession" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="mother_profession" class="control-label col-lg-3">Mother's Profession</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="mother_profession" name="mother_profession" type="text" />
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
                                                            <label for="nid" class="control-label col-lg-3">National Id no.</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="nid" name="nid" type="text" />
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
                                        <select name="classesID" id="classesID" class="form-control">
                                            <option value="0">Select Class</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                            <option value="6">Six</option>
                                            <option value="7">Seven</option>
                                            <option value="8">Eight</option>
                                            <option value="9">Nine</option>
                                            <option value="10">Ten</option>
                                        </select>                                </div>
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
                                ALL Institute
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
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Guradian Id</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($parents as $a)
                                            <tr class="">
                                                <td>{{$a->guardian_name}}</td>
                                                <td>{{$a->guradian_id}}</td>
                                                <td>{{$a->fathers_name}}</td>
                                                <td>{{$a->mothers_name}}</td>
                                                <td>{{$a->email}}</td>
                                                <td class="center">{{$a->phone}}</td>

                                                <td><a   href="">View More</a></td>
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
       