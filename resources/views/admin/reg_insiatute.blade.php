@extends('layouts.submaster')
@section('title')
Institute | Registration
@stop
@section('head')
  <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
@stop

@section('body')
<div class="row">
    <div class="col-lg-12">
          {!!Form::open()!!} 
        <section class="panel">
            <header class="panel-heading">
              Add  Details Informations
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
                                    Add New <i class="fa fa-plus"></i>
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

                      <div class="space15"></div>                  
                   
                      <div ng-show="test.showBoxOne">
               
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
                                <input class="form-control " id="icode" name="icode" type="text" />
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
                                <input class="form-control " id="iphone" name="iaddress" type="text" />
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
                                <input class="form-control " id="iusername" name="inurl" type="text" placeholder="www.digitialaducation.example" />
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
                </div>
            </div>
        </section>
         {!!Form::close()!!} 
                        </div>
                        </div>
                    </div>
                   </div> 
                </div>
                  
            </div>
        </section>
       
    </div>
</div>

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
