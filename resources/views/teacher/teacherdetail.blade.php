@extends('layouts.submaster')
@section('title')
    Teachers's Details
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Institute Details Information
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
                        <div class="pricing-table most-popular">
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">Institute Code:{{$individualTeacher->institute_code}}</a>
                            </div>
                            <div class="pricing-head">
                                <h3 style="color: white">Name: {{$individualTeacher->name}} </h3>
                            </div>
                            <div >
                                <img class="pricing-quote"  src="{{URL::to('/')}}/images/{{$individualTeacher->image}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check"></i>Designation: {{$individualTeacher->designation}}</li>
                                        <li><i class="fa fa-check"></i>Date Of Birth: {{$individualTeacher->birth_date}}</li>
                                        <li><i class="fa fa-check"></i>Religion:  {{$individualTeacher->religion}}</li>
                                        <li><i class="fa fa-check"></i>National id No: {{$individualTeacher->national_id}}</li>
                                        <li><i class="fa fa-check"></i>Gender: {{$individualTeacher->gender}}</li>



                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">

                                        <li><i class="fa fa-check"></i>Phone no.{{$individualTeacher->phone}}</li>
                                        <li><i class="fa fa-check"></i>Email: {{$individualTeacher->email}}</li>
                                        <li><i class="fa fa-check"></i>Address: {{$individualTeacher->address}}</li>


                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Create Time: {{$individualTeacher->created_at}}</b>
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