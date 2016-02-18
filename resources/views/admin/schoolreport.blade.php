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
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                All Reports
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
            </header>
            <div class="panel-body">
                <select class="form-control">
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                </select>
                <select class="form-control">
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                </select>
                <select class="form-control">
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                </select>
                <select class="form-control">
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                </select>
                <select class="form-control">
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                    <option value="">ONE</option>
                </select>
            </div>
        </section>
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
