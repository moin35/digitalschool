@extends('layouts.submaster')
@section('title')
    Teachers
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

@stop

@section('body')
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    <div class="row">
        <div class="col-sm-12">
              @if(Auth::check())
             
         
                @if(Session::get('data'))
                    <div class="alert alert-dismissible alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> <h3>{{Session::get('data')}}</h3></strong>
                    </div>
                @endif



            <section class="panel">
                <!-- page start-->

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">

                            <header class="panel-heading">
                                ALL Teacher
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                            </header>
                            <div class="panel-body">
                                     <div class="adv-table editable-table ">
                                    <div class="clearfix">
                                    @if(Auth::user()->teacheradd==1)
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{URL::to('admin/add/teacher')}}" >
                                        Add New Teacher <i class="fa fa-plus"></i>
                                    </a>
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
                                    </div>
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Teacher Id</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($teacher as $a)
                                            <tr class="">
                                                <td>{{$a->name}}</td>
                                                <td>{{$a->teacher_id}}</td>
                                                <td>{{$a->email}}</td>
                                                <td class="center">{{$a->phone}}</td>
                                                <td>{{$a->designation}}</td>
                                                <td>
                                                    <a class="btn btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="View More"  href="{{URL::to('/')}}/teachers/details/{{$a->id}}" ><i class="fa fa-eye"></i> </a>
                                                         @if(Auth::check())
                                                            @if(Auth::user()->teacheradd==1)
                                                    <a class="btn btn-round btn-warning tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/teachers/edit/{{$a->teacher_id}}"><i class="fa fa-edit"></i> </a>
                                                    <a class="btn btn-round btn-danger tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Delete" href="{{URL::to('/')}}/teachers/delete/{{$a->teacher_id}}" ><i class="fa  fa-trash-o"></i></a>
                                                        @endif
                                                        @endif
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
        </section>
        </div>
    </div>
    <!-- page end-->
@endif

    <script>
        function TestCtrl() {
            var self = this;

            self.showBoxOne = false;
            self.showBoxTwo = false;


        }

        angular.module('app', ['ngAnimate'])
                .controller('TestCtrl', TestCtrl)
    </script>
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
@stop
