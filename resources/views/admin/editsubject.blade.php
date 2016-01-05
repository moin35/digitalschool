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
                                <a href="javascript:;" class="btn">Institute Code:{{$icode}}</a>
                            </div>

                            <br><br><br>
                            <hr>

                            <div class="list-unstyled">

                                {!! Form::open(array('id'=>'subjectinfo','class'=>'form-horizontal bucket-form')) !!}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Subject name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$subedit->subject_name}}" name="subname" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Subject Code</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$subedit->subject_code}}" name="subcode" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Teacher Name</label>
                                    <div class="col-sm-6">
                                        <select name='subteacher'  class="form-control"  >
                                           @foreach($teacher as $r=>$t)
                                                @if($subedit->teacher_name==$t)
                                                <option value="{{$t}}" selected="selected">{{$r}}</option>
                                                @else
                                                    <option value="{{$t}}" >{{$r}}</option>

                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Class </label>
                                    <div class="col-sm-6">
                                        <select name='subclass'  class="form-control"  >

                                            @foreach($class as $r=>$t)
                                                @if($subedit->class_id==$t)
                                                <option value="{{$t}}" selected="selected">{{$r}}</option>

                                                @else
                                                    <option value="{{$t}}" >{{$r}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Author </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$subedit->sub_author}}" name="subauth" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Note </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$subedit->note}}" name="note" class="form-control round-input">
                                    </div>
                                </div>
                             <br> <div class="price-actions">
                                    <button type="submit" class="btn">Update Information</button>

                                </div>

                                {!!Form::close()!!}

                            </div>

                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Last Update: {{$subedit->updated_at}}</b>
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