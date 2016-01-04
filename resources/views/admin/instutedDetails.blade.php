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
                                    <a href="javascript:;" class="btn">Institute Code:{{$detailinf->institute_code}}</a>
                                </div>
                                <div class="pricing-head">
                                    <h1>{{$detailinf->institute_name}} </h1>
                                   
                                </div>
                                <div class="pricing-quote">
                                 <span class="note">{{$detailinf->logo}}Logo</span>
                                    <p> </p>
                                </div>
                               
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check"></i>{{$detailinf->email}}</li>
                                    <li><i class="fa fa-check"></i>{{$detailinf->phone}}</li>
                                    <li><i class="fa fa-check"></i> {{$detailinf->address}}</li>
                                  
                                     <li><i class="fa fa-check"></i>{{App\Division::where('id','=',$detailinf->division)->pluck('Division')}}</li>
                                    <li><i class="fa fa-check"></i>{{$detailinf->district}}</li>
                                    <li><i class="fa fa-check"></i> {{$detailinf->thana}}</li>
                                    <li><i class="fa fa-check"></i> {{$detailinf->url}}</li>
                                </ul>
                               
                            </div>
                            <div class="text-center">
                                  <b>  <i class="fa fa-check"></i>Create Time: {{$detailinf->created_at}}</b>
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