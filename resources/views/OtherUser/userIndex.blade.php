@extends('layouts.submaster')
@section('title')
User
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
                Add User
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
                                    Add User Information <i class="fa fa-plus"></i>
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

                            </div>
                            <div class="box-one" ng-show="test.showBoxOne">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Institute Add Information
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                            </header>
                                            <div class="panel-body">
                                                {!!Form::open(array('id'=>'signupinstute','class'=>'cmxform form-horizontal','files'=>'true')) !!}
                                                <section class="panel">

                                                    <div class="panel-body">

                                                        <div class="form">

                                                            <div class="cmxform form-horizontal " id="signupFormt1">

                                                            <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Date of Birth</label>
    <input  name="dbirth" id="dbirth"  class="form-control default-date-picker"  size="16" type="text" value="" />

</div>
<div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
    <select class="form-control input-sm m-bot15" id="gender" name="gender" type="text">
<option selected>Select a Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Religion</label>
   <input class=" form-control" id="Religion" name="Religion" type="text" />
</div>

<div class="form-group">
     <label for="exampleInputEmail1">Address</label>

  <textarea class="form-control"  id="address" name="address" rows="6"></textarea>
    </div>

 <div class="form-group">
     <label for="exampleInputEmail1">Email</label>
    <input class="form-control " id="email" name="email" type="email" />
 </div>

 <div class="form-group">
     <label for="exampleInputEmail1">Phone</label>
    <input class=" form-control" id="phone" name="phone" type="number" />
 </div>
 <div class="form-group">
     <label for="exampleInputEmail1">Joining Date</label>
     <input  name="jobinDate" id="jobinDate"  class="form-control default-date-picker"  size="16" type="text" value="" />

 </div>
 <div class="form-group last">
<label class="control-label col-md-3">Image Upload</label>
<div class="col-md-9">
<div class="fileupload fileupload-new"  data-provides="fileupload" id="image" name="image">
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
<label for="exampleInputEmail1">Type</label>
<select class="form-control input-sm m-bot15" id="utype" name="utype" type="text">
<option value="Accountant">Accountant</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Username</label>
<input class="form-control " id="username" name="username" type="text" />
</div>
<div class="form-group">
<label for="exampleInputEmail1">Password</label>
<input class="form-control " id="password" name="password" type="password" />
</div>
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
 <input class="form-control " id="conpass" name="conpass" type="password" />
</div>

                                                                <div class="form-group">
                                                                    <div class="col-lg-offset-3 col-lg-6">
                                                                        <button class="btn btn-primary" type="submit">Save</button>
                                                                        <button class="btn btn-default" type="reset">Cancel</button>
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

                    </div>
                    <div class="space15"></div>

                </div>


            </div>
        </section>

        <section class="panel">
             <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        ALL User
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
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($alluser as $a)
                                <tr>
                                    <td>{{$a->name}}</td>
                                     <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/{{$a->image}} "></td>
                                    <td>{{$a->email}}</td>
                                    <td class="center">{{$a->phone}}</td>
                                    <td><a  href="{{$a->url}}">{{$a->user_type}}</a></td>
                                    <td><a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/user/details/{{$a->id}}" ><i class="fa fa-eye"></i> </a>
                                        <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/user/details/edit/{{$a->id}}"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/user/info/delete/{{$a->id}}" ><i class="fa  fa-trash-o"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!---end----!>
                      <!-- Modal -->
                          <div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
         <h3>Order</h3>

    </div>
    <div id="orderDetails" class="modal-body"></div>
    <div id="orderItems" class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
                       <!-- Modal -->

                </section>
            </div>
        </div>
        <!-- page end-->
                </section>
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
