@extends('layouts.submaster')
@section('title')
    Institute Details
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
                                <a href="javascript:;" class="btn">Institute Code:{{$individualstudent->institute_code}}</a>
                            </div>
                            <div class="pricing-head">
                                <h3 style="color: white">Name: {{$individualstudent->name}} </h3>

                                <p style="color: white">Class: {{$individualstudent->class}} </p>
                            </div>
                            <div class="pricing-quote">
                                <span class="note">{{$individualstudent->image}}Image</span>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check"></i>Roll: {{$individualstudent->roll}}</li>
                                        <li><i class="fa fa-check"></i>Date Of Birth: {{$individualstudent->birth_certificate}}</li>
                                        <li><i class="fa fa-check"></i>Religion:  {{$individualstudent->religion}}</li>
                                        <li><i class="fa fa-check"></i>Section: {{$individualstudent->section}}</li>
                                        <li><i class="fa fa-check"></i>Gender: {{$individualstudent->gender}}</li>



                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">

                                        <li><i class="fa fa-check"></i>Guardian Name: {{$individualstudent->guardian_name}}</li>
                                        <li><i class="fa fa-check"></i>Phone no.{{$individualstudent->phone}}</li>
                                        <li><i class="fa fa-check"></i>Email: {{$individualstudent->email}}</li>
                                        <li><i class="fa fa-check"></i>Address: {{$individualstudent->address}}</li>


                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Create Time: {{$individualstudent->created_at}}</b>
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