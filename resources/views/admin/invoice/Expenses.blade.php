@extends('layouts.submaster')
@section('title')
  Expense
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
    <meta name="_token" content="{{ csrf_token() }}" />

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Expense
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
                                        Create Expense  <i class="fa fa-plus"></i>
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
                                                    Add Expense
                                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                                    <a href="javascript:;" class="fa fa-cog"></a>
                                                    <a href="javascript:;" class="fa fa-times"></a>
                                                </span>
                                                </header>
                                                <div class="panel-body">

                                                    {!!Form::open(array('id'=>'ExpenseTest','class'=>'cmxform form-horizontal')) !!}
                                                    <section class="panel">
                                                      <div id="msj-success"  class="alert alert-success fade in" role="alert" style="display:none">
                                                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                          <strong>Your successfully</strong>.
                                                      </div>
                                                        <div class="panel-body">

                                                            <br><br>
                                                            <div class="form">
                                                                <div class="cmxform form-horizontal ">


                                               <div class="form-group ">
                                                   <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Name</label>
                                                   <div class="col-lg-6">
                                                       <input class="form-control num1" id="expensesName" name="expensesName" type="text" />

                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label for="date" class="col-sm-2 col-sm-offset-2 control-label-right">Date</label>
                                                   <div class="col-lg-6">
                                                       <input class="form-control form-control-inline input-medium default-date-picker" id="edateid" name="edateid" type="text" />
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Total Amount</label>
                                                   <div class="col-lg-6">
                                                       <input class="form-control num1" id="amountid" min='0' name="amountid" type="text" />

                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                                   <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Note</label>
                                                                   <div class="col-sm-6">
                                                                       <textarea class="form-control" id="enote" name="enote" rows="6"></textarea>
                                                                   </div>
                                                </div>


                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-3 col-lg-6">
                                                                            <button class="btn btn-primary" type="submit">    Expense  <i class="fa fa-plus"></i></button>

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

                                                                                       <th>Name <i class="fa-caret-up"></i></th>
                                                                                       <th>User</th>
                                                                                       <th>Date</th>
                                                                                       <th>Amount</th>
                                                                                      <th>Note</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                 @foreach($allresultViews as $c)
                                                                                    <tr class="">
                                                                                      <td>{{$c->id}}</td>
                                                                                      <td> {{$c->name}}</td>
                                                                                      <td> {{$c->users}} </td>
                                                                                      <td> {{$c->date}} </td>
                                                                                        <td> {{$c->amount}} </td>
                                                                                      <td> {{$c->note}} </td>
                                                                                        <td>
                                                                                            <a class="btn btn-round btn-success tooltips" title="" data-placement="top" data-toggle="tooltip"   data-original-title="Edit"  href="{{URL::to('/')}}/mark/view/{{$c->id}}"><i class="fa fa-eye"></i> </a>

                                                                                        </td>
                                                                                    </tr>
                                                                                  @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                            </div>

                        </div>
                        <div class="space15"></div>

                    </div>


                </div>
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
    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
    </script>

@stop
@section('scripts')

 <script type="text/javascript">
 $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
 });
 </script>
<script >


$(".num2").keyup(function(){
  $("#answer").html('');
  var n1 = $('input[name="amount"]').val();
  var n2 = $('input[name="paid"]').val();
  var ans = n1 - n2;
  $("#answer").val(ans);
  // $("#answer").append("<input value='"+ ans +"'>");
});

$(".num1").keyup(function(){
  $("#answer").html('');
  var n1 = $('input[name="amount"]').val();
  var n2 = $('input[name="paid"]').val();
  var ans = n1 - n2;
   $("#answer").val(ans);
  //$("#answer").append("<input value='"+ ans +"'>");
});
</script>

@endsection
