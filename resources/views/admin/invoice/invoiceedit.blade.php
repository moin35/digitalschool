@extends('layouts.submaster')
@section('title')
Invoice Edit
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Section  Edit Information
                </header>
                <div class="panel-body">
                    @if(Session::get('data'))
                        <div class="bs-example">
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>{{Session::get('data')}}</strong>.
                            </div>
                        </div>
                    @endif


                    {!! Form::open(array('id'=>'sectioninfo','class'=>'form-horizontal bucket-form')) !!}

                        <div class="form-group ">
                            <label for="class" class="col-sm-2 col-sm-offset-2 control-label-right">Class</label>
                            <div class="col-lg-6">
                                <select class="form-control input-sm m-bot15 invoiceclass"  id="classid" name="class" type="text">

                                    @foreach($classview as $r=>$t)
                                        @if($voucher->class_name==$t)
                                            <option value="{{$t}}" selected="selected">{{$r}}</option>
                                        @else
                                            <option value="{{$t}}" >{{$r}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                Section </label><br>
                            <div class="col-sm-6">
                                <select  id="sectionid"  name="section" class="form-control invoicesection" >
                                    <option  selected="selected">{{$voucher->section_id}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
                                Student </label><br>
                            <div class="col-sm-6">
                                <select  id="studentid"  name="student" class="form-control invoicestudent" >
                                    <option  selected="selected">{{$voucher->student_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feetype" class="col-sm-2 col-sm-offset-2 control-label-right">
                                Fee Type </label><br>
                            <div class="col-sm-6">
                                <select  id="feeid"  name="feetype" class="form-control fee" >
                                    @foreach($feetype as $r=>$t)
                                        @if($voucher->fee_id==$t)
                                            <option value="{{$t}}" selected="selected">{{$r}}</option>
                                        @else
                                            <option value="{{$t}}" >{{$r}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Total Amount</label>
                            <div class="col-lg-6">
                                <input class="form-control num1" id="amountid" min='0' name="amount" value="{{$voucher->total_amount}}" type="text" />

                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Paid Amount</label>
                            <div class="col-lg-6">
                                <input class="form-control num2" id="paidamountid" min='0' value="{{$voucher->payment_ammount}}"  name="paid" type="text" />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right" >Due Amount</label>
                            <div class="col-lg-6">

                                <input id='answer' name="answer" type="text" value="{{$voucher->due_amount}}" readonly/>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="date" class="col-sm-2 col-sm-offset-2 control-label-right">Date</label>
                            <div class="col-lg-6">
                                <input class="form-control form-control-inline input-medium default-date-picker" id="dateid" name="date" value="{{$voucher->date}}" type="text" />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-3 control-label"> </label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>



                    {!!Form::close()!!}
                </div>
            </section>





        </div>
    </div>





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
@endsection