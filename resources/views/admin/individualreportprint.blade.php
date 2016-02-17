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
                                <div class="col-md-8 col-xs-6 payment-method">
                                    <h4>Payment Method</h4>
                                    <p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>2. Pellentesque tincidunt pulvinar magna quis rhoncus.</p>
                                    <p>3. Cras rhoncus risus vitae congue commodo.</p>
                                    <br>
                                    <h3 class="inv-label itatic">Thank you for your business</h3>
                                </div>
                                <div class="col-md-4 col-xs-6 invoice-block pull-right">
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

<!--common script init for all pages-->
<script src="js/scripts.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
