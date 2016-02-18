
@extends('layouts.submaster')
@section('title')
    Setting
@stop
@section('head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  Setting
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
                                <a href="javascript:;" class="btn">Institute Code:{{Auth::user()->institute_id}}</a>
                            </div>

                            <br><br><br>
                            <hr>

                            <div class="unstyled">

                                {!! Form::open(array('id'=>'iiSetting','class'=>'form-horizontal bucket-form')) !!}

                                  <div id="msj-success"  class="alert alert-success fade in" role="alert" style="display:none">
                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                      <strong>Your successfully</strong>.
                                  </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">URL</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->url}}" name="iurl" class="form-control input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Site Title/Name </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->institute_name}}" name="iname" class="form-control input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone No </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->phone}}" name="phone" class="form-control input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">System Email  </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->email}}" name="email" class="form-control input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        Division                             </label>
                                    <div class="col-sm-6">

                                        <select name='division'  id="make" class="form-control"  >
                                            <option  selected="selected" >Choose Division</option>
                                              <option value="{{$Isetting->division}}" selected="selected">{{$divisionName}}</option>
                                            @foreach($divisionlist as $r=>$t)
                                            <option value="{{$t}}">{{$r}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        District/Zilla                            </label>
                                    <div class="col-sm-6">
                                        <select    name="district" class="form-control model" >
                                            <option value="{{$Isetting->district}}" selected="selected">{{$Isetting->district}}</option>
                                            <option>First Choose Division</option>

                                        </select>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        Thana/Upazilla                           </label>
                                    <div class="col-sm-6">
                                        <select name="thana" id="idthana" class="form-control">
                                            <option value="{{$Isetting->thana}}" selected="selected">{{$Isetting->thana}}</option>
                                            <option> Choose Thana/Upazilla</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->address}}" name="address" class="form-control round-input">
                                    </div>
                                </div>




                                <br> <div class="price-actions">
                                    <button type="submit" class="btn">Update Information</button>

                                </div>

                                {!!Form::close()!!}

                            </div>

                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Last Update: {{$Isetting->updated_at}}</b>
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
