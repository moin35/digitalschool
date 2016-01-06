@extends('layouts.submaster')
@section('title')
Institute Edit
@stop
@section('head')
    
@stop

@section('body')   
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                Institute  Edit Information
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
                                    <a href="javascript:;" class="btn">Institute Code:{{$detailinf->institute_code}}</a>
                                </div>
                                <div class="pricing-head">
                                    <h1>{{$detailinf->institute_name}} </h1>
                                   
                                </div>
                                <div class="pricing-quote">
                                 <span class="note">{{$detailinf->logo}}Logo</span>
                                    <p> </p>
                                </div>
                                <br><br><br>
                                <hr>
                             
                                <div class="list-unstyled">
                                     
                                          {!! Form::open(array('id'=>'signupinstute','class'=>'form-horizontal bucket-form')) !!}
                                      <div class="form-group">
                        <label class="col-sm-3 control-label">Institute</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->institute_name}}" name="institute_name" class="form-control round-input">
                        </div>
                    </div>
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->email}}" name="email" class="form-control round-input">
                        </div>
                    </div>
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->phone}}" name="phone" class="form-control round-input">
                        </div>
                    </div>
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->address}}" name="iaddress" class="form-control round-input">
                        </div>
                    </div>
                                     
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">District</label>   
                    
                    <div class="col-sm-6">
                        <select class="form-control input m-bot15" name="district">                            
                            @foreach($division as $r=>$t)                            
                            @if($detailinf->district==$t)
                            <option value="{{$t}}" selected="selected" >{{$r}} </option>
                            @else
                              <option value="{{$t}}">{{$r}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                
                    </div>
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">Thana</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->thana}}" name="thana" class="form-control round-input">
                        </div>
                    </div>
                                          <div class="form-group">
                        <label class="col-sm-3 control-label">Web URL:</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$detailinf->url}}" name="inurl" class="form-control round-input">
                        </div>
                                          </div><br> <div class="price-actions">
                                              <button type="submit" class="btn">Update Information</button>
                                   
                                </div>
                                         
                            {!!Form::close()!!}
                                    
                                </div>
                               
                            </div>
                            <div class="text-center">
                                  <b>  <i class="fa fa-check"></i>Last Update: {{$detailinf->updated_at}}</b>
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