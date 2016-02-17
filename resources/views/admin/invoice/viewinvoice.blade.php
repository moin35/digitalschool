@extends('layouts.submaster')
@section('title')
    Print Invoice
@stop
@section('head')


@stop

@section('body')
        <!--main content start-->



            <!-- page start-->

            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body invoice">
                            <div class="invoice-header">
                                <div class="invoice-title col-md-3 col-xs-2">
                                    <h1>invoice</h1>
                                   <img width="200px" class="logo-print" src="{{URL::to('/')}}/images/abc.jpg" alt="">

                                </div>
                                <div class="invoice-info col-md-9 col-xs-10">

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
                                    <h4>Invoice To:</h4>
                                    <h2>{{$print->student_name}}</h2>
                                    <p>
                                      Class: {{$print->class_name}}
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-5 pull-right">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-5 inv-label">Invoice #</div>
                                        <div class="col-md-8 col-sm-7">{{$print->invoice_id}}</div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-5 inv-label">Date #</div>
                                        <div class="col-md-8 col-sm-7">{{$print->date}}</div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 inv-label">
                                            <h3>TOTAL DUE</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <h1 class="amnt-value">Tk. {{$print->due_amount}}</h1>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <table class="table table-invoice" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Description</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Paid</th>
                                    <th class="text-center">Total Due</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <h4>{{$print->fee_type}}</h4>
                                        <!--<p>Service Four Description Lorem ipsum dolor sit amet.</p>-->
                                    </td>
                                    <td class="text-center">Tk. {{$print->total_amount}}</td>
                                    <td class="text-center">Tk. {{$print->payment_ammount}}</td>
                                    <td class="text-center">Tk. {{$print->due_amount}}</td>
                                </tr>
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
                                        <li class="grand-total">Grand Total Paid: Tk. {{$print->payment_ammount}}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="text-center invoice-btn">
                                <a class="btn btn-success btn-lg"><i class="fa fa-check"></i> Submit Invoice </a>
                                <a href="{{URL::to('/')}}/print/invoice/{{$print->id}}" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
                            </div>

                        </div>
                    </section>
                </div>
            </div>


    <!--main content end-->
@stop
@section('scripts')
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
    <script src="{{URL::to('/')}}/ajaxjs/invoice.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/ajaxjs/invoiceup.js" type="text/javascript"></script>
@endsection

