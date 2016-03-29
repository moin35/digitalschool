@extends('layouts.submaster')
@section('title')
Teacher Allocation
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
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Teacher Allocation
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
                                        <th>Tid</th>
                                     <th>Teacher</th>
                        
                                    <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($view as $v => $m)
                                        <tr>
                                            <td>{{$m->teacher_id}}</td>
                                            <td>{{$m->name}}</td>
                                      
                                           <td><a class="btn btn-success" href="{{URL::to('/')}}/allocation/permission/{{$m->teacher_id}}">Set Permission</a></td>
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
        <a href="#" id="try" data-link="{{URL::to('/')}}" data-token="{{ csrf_token() }}"></a>
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
    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
    </script>
@stop
@section('scripts')

    <script src="{{URL::to('/')}}/ajaxjs/teacherallocation.js" type="text/javascript"></script>
@endsection