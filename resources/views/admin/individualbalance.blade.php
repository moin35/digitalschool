@extends('layouts.submaster')
@section('title')
    Balance
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
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body invoice">
                    <div class="invoice-header">
                        <div class="invoice-title col-md-6 col-xs-2">
                            <h2>{{$iis->institute_name}}</h2>
                        </div>
                        <div class="invoice-info col-md-6 col-xs-10">

                            <div class="pull-right">
                                <div class="col-md-6 col-sm-6 pull-left">
                                    <p>{{$iis->address}}</p>
                                </div>
                                <div class="col-md-6 col-sm-6 pull-right">
                                    <p>Phone: {{$iis->phone}} <br>
                                        Email : {{$iis->email}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row invoice-to">
                        <div class="col-md-4 col-sm-4 pull-left">

                            <h2>{{$print->student_name}}</h2>
                            <p>
                                Class: {{$print->class_name}}
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-5 pull-right">
                            <div class="row">
                                <div class="col-md-4 col-sm-5 inv-label">Date #</div>
                                <div class="col-md-8 col-sm-7"><?php echo date("Y-m-d"); ?></div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-invoice" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Description</th>
                            <th>Payment date</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Paid</th>
                            <th class="text-center">Total Due</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($balance as $c)
                        <tr>

                            <td>
                                <h4>{{$c->fee_type}}</h4>
                                <!--<p>Service Four Description Lorem ipsum dolor sit amet.</p>-->
                            </td>
                            <td class="text-center">{{$c->date}}</td>
                            <td class="text-center">Tk. {{$c->total_amount}}</td>
                            <td class="text-center">Tk. {{$c->payment_ammount}}</td>
                            <td class="text-center">Tk. {{$c->due_amount}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-8 col-xs-7 payment-method">
                            <h4>Payment Method</h4>
                            <p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p>2. Pellentesque tincidunt pulvinar magna quis rhoncus.</p>
                            <p>3. Cras rhoncus risus vitae congue commodo.</p>
                            <br>
                            <h3 class="inv-label itatic">Thank you for your business</h3>
                        </div>
                        <div class="col-md-4 col-xs-5 invoice-block pull-right">
                            <ul class="unstyled amounts">
                                <!-- <li>Sub - Total amount : $3820</li>
                                 <li>Discount : 10% </li>
                                 <li>TAX (15%) ----- </li>-->
                                <li class="grand-total">Grand Total Amount: Tk. {{$total}}</li>
                                <li class="grand-total">Grand Total Paid: Tk. {{$paid}}</li>
                                <li class="grand-total">Grand Total Due: Tk. {{$due}}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="text-center invoice-btn">
                        <a class="btn btn-success btn-lg"><i class="fa fa-check"></i> Submit Invoice </a>
                        <a href="{{URL::to('/')}}/print/individual/report/{{$print->student_name}}" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
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
