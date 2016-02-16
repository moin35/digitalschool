<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Invoice</title>

    <!--Core CSS -->
    <link href="{{URL::to('/')}}/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style-responsive.css" rel="stylesheet" />

    <link href="{{URL::to('/')}}/css/invoice-print.css" rel="stylesheet" media="all">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="{{URL::to('/')}}/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" class="print" >

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
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
                                        <li class="grand-total">Total Paid: Tk. {{$print->payment_ammount}}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>


            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="{{URL::to('/')}}/js/jquery.js"></script>
<script src="{{URL::to('/')}}/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{URL::to('/')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{URL::to('/')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{URL::to('/')}}/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="{{URL::to('/')}}/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="{{URL::to('/')}}/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="{{URL::to('/')}}/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.resize.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.pie.resize.js"></script>


<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
