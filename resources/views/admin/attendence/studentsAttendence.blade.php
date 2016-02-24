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
                        New Student Table
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="list-group-item list-group-item-warning">
                                <form style="" class="form-horizontal" role="form" method="post">
                                    <div class="form-group">
                                        <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                            Class                                </label>
                                        <div class="col-sm-8">
                                            <select type="search" class="form-control select-table-filter " data-table="order-table">
                                                <option value="">Reset</option>
                                                @foreach($allclass as $r=>$t)
                                                    <option value="{{$r}}">{{$r}}</option>
                                                @endforeach
                                                <select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                        Datetime                               </label>

                                  <div class="col-md-8">
                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-adv">
                                           <input type="text" class="form-control" readonly="" size="16">
                                           <div class="input-group-btn">
                                               <button type="button" class="btn btn-primary date-reset"><i class="fa fa-times"></i></button>
                                               <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                           </div>
                                       </div>
                                  </div>
                              </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                                        <section class="panel">
                                            <!-- page start-->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <section class="panel">

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

                                                                        <tr class="">
                                                                            <td>id}}</td>
                                                                            <td> name}}</td>
                                                                            <td> roll}}</td>
                                                                            <td> phone}}</td>

                                                                            <td class="center"><img width="70px" height="70px" src="{{URL::to('/')}}/images/ "></td>
                                                                            <td>  class_name}}</td>
                                                                            <td>
                                                                                <a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/student/details/" ><i class="fa fa-eye"></i> </a>
                                                                                <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/student/edit/ "><i class="fa fa-edit"></i> </a>
                                                                                <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/student/delete/" ><i class="fa  fa-trash-o"></i></a>
                                                                            </td>
                                                                        </tr>

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
