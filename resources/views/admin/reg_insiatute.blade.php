@extends('layouts.submaster')
@section('title')
Institute
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
                Institute Information
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
                                    Add Institute <i class="fa fa-plus"></i>
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
                                                {!!Form::open(array('id'=>'signupinstute','class'=>'cmxform form-horizontal')) !!}
                                                <section class="panel">

                                                    <div class="panel-body">

                                                        <br><br>
                                                        <div class="form">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8" >
                                                                <div class="row">
                                                                    <div class="list-group-item list-group-item-warning">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div style="" class="form-horizontal" >
                                                                                <div class="form-group">
                                                                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                        Division                             </label><br>
                                                                                    <div class="col-sm-6">

                                                                                        <select name='division'  id="make" class="form-control"  >
                                                                                            <option  selected="selected" >Choose Division</option>
                                                                                            @foreach($divisionlist as $r=>$t)
                                                                                            <option value="{{$t}}">{{$r}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <br>

                                                                    <div class="list-group-item list-group-item-warning">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div style="" class="form-horizontal" >
                                                                                <div class="form-group">
                                                                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                        District/Zilla                            </label><br>
                                                                                    <div class="col-sm-6">
                                                                                        <select    name="district" class="form-control model" >
                                                                                            <option  selected="">First Choose Division</option>

                                                                                        </select>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>

                                                                    <div class="list-group-item list-group-item-warning">
                                                                        <div class="list-group-item list-group-item-warning">
                                                                            <div style="" class="form-horizontal" >
                                                                                <div class="form-group">
                                                                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                                                                        Thana/Upazilla                           </label><br>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="thana" id="idthana" class="form-control col-lg-12">
                                                                                            <option value="0"> Choose Thana/Upazilla</option>

                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="cmxform form-horizontal " id="signupFormt1">

                                                                <div class="form-group ">
                                                                    <label for="icode" class="control-label col-lg-3">Institute Code</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control " id="icodes" name="icode" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="institute_name" class="control-label col-lg-3">Institute name</label>
                                                                    <div class="col-lg-6">
                                                                        <input class=" form-control" id="institute_name" name="institute_name" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="iphone" class="control-label col-lg-3">Institute Address</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control "   name="iaddress" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="iphone" class="control-label col-lg-3">Institute Phone No.</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control " id="iphone" name="iphone" type="number" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="email" class="control-label col-lg-3">Email</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control " id="email" name="email" type="email" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="iusername" class="control-label col-lg-3">URL</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control "  name="inurl" type="text" placeholder="www.digitialaducation.example" />
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
                                    
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($allinstuted as $a)
                                <tr class="">
                                    <td>{{$a->institute_name}}</td>
                                    <td>{{$a->institute_code}}</td>
                                    <td>{{$a->email}}</td>
                                    <td class="center">{{$a->phone}}</td>
                                    <td><a  href="{{$a->url}}">{{$a->url}}</a></td>
                                    <td><a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/institute/details/{{$a->institute_code}}" ><i class="fa fa-eye"></i> </a>
                                        <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/institute/edit/{{$a->institute_code}}"><i class="fa fa-edit"></i> </a> 
                                        <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/institute/delete/{{$a->institute_code}}" ><i class="fa  fa-trash-o"></i></a>
                                         
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                     
                    
                    <!---end----!>
                      <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Modal Tittle</h4>
                                        </div>
                                        <div class="modal-body">

                                            Body goes here...

                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-warning" type="button"> Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                            <!-- modal -->
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
