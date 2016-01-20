@extends('layouts.submaster')
@section('title')
    Edit | Student's
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Student's  Edit Information
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <!--price start-->

                    <div class="col-lg-2 col-sm-2">

                    </div>
                    <div class="col-lg-8 col-sm-8">
                        @if(Session::get('data'))
                            <div class="bs-example">
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>{{Session::get('data')}}</strong>.
                                </div>
                            </div>

                        @endif
                        <div class="pricing-table most-popular">
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">Institute Code:{{$icode}}</a>
                            </div>

                            <br><br><br>
                            <hr>

                            <div class="list-unstyled">

                                {!! Form::open(array('id'=>'subjectinfo','class'=>'form-horizontal bucket-form','files'=>'true')) !!}

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Guardian Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->guardian_name}}" name="guardian_name" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fathers Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->fathers_name}}" name="fathers_name" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mothers Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->mothers_name}}" name="mothers_name" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fathers profession</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->fathers_profession}}" name="fathers_profession" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mothers profession</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->mothers_profession}}" name="mothers_profession" class="form-control round-input">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Religion </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->religion}}" name="religion" class="form-control round-input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">National id no.</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->national_id}}" name="national_id" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->email}}" name="email" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->phone}}" name="phone" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$parentsedit->address}}" name="address" class="form-control round-input">
                                    </div>
                                </div>

                                <br> <div class="price-actions">
                                    <button type="submit" class="btn">Update Information</button>

                                </div>

                                {!!Form::close()!!}

                            </div>

                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Last Update: {{$parentsedit->updated_at}}</b>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-2">

                    </div>
                    <!--price end-->
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@stop