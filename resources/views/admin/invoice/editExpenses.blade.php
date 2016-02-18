@extends('layouts.submaster')
@section('title')
Expense Edit
@stop
@section('head')

@stop

@section('body')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Expense  Edit Information
            </header>
            <div class="panel-body">
                @if(Session::get('data'))
                <div class="bs-example" >
                    <div id="BodyField" class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>{{Session::get('data')}}</strong>.
                    </div>
                </div>
                @endif


                {!! Form::open(array('id'=>'ExpenseUpdate','class'=>'form-horizontal bucket-form')) !!}

                <section class="panel">

                    <div class="panel-body">
                      <div id="msj-success"  class="alert alert-success fade in" role="alert" style="display:none">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Your successfully</strong>.
                      </div>
                        <br><br>
                        <div class="form">

                            <div class="cmxform form-horizontal " id="signupFormt1">

                                <div class="form-group ">
                                    <label for="icode" class="control-label col-lg-3">Expense Name</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" value="{{$editExpense->id}}" name="expensesName" id="eid" type="hidden" />
                                        <input class="form-control" value="{{$editExpense->name}}" name="expensesName" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="icode" class="control-label col-lg-3">Date</label>
                                    <div class="col-lg-6">
                                      <input class="form-control form-control-inline input-medium default-date-picker"   value="{{$editExpense->date}}" id="edateid" name="edateid" type="text" />  </div>
                                </div>

                                <div class="form-group ">
                                    <label for="institute_name" class="control-label col-lg-3">Amount</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="{{$editExpense->amount}}" name="amountid" type="text" />
                                    </div>
                                </div>


                                 <div class="form-group">
                                 <label class="col-sm-3 control-label">Note</label>
                                 <div class="col-sm-6">
                                     <textarea class="form-control" value="{{$editExpense->note}}" name="enote" rows="6">{{$editExpense->note}}</textarea>
                                 </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
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



<script>
$("#BodyField").delay(5000).fadeOut();
</script>

@stop
