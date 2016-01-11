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

                                    <div class="col-sm-6">
                                        <div class="row">
                                        <div class="form-group last">
                                            <label class="control-label col-md-5">Change Image</label>
                                            <div class="col-md-7">
                                                <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{URL::to('/')}}/images/{{$studentedit->image}}" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" name="image" class="default" />
                                                   </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Student name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->name}}" name="name" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Roll</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->roll}}" name="roll" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Guardian Name</label>
                                    <div class="col-sm-6">
                                        <select name='gname'  class="form-control"  >
                                            @foreach($teacher as $r=>$t)
                                                @if($studentedit->guardian_name==$t)
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
                                        <select name='class'  class="form-control class"  >
                                            @foreach($class as $r=>$t)
                                                @if($studentedit->class_id==$t)
                                                    <option value="{{$t}}" selected="selected">{{$r}}</option>
                                                @else
                                                    <option value="{{$t}}" >{{$r}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Section </label>
                                    <div class="col-sm-6">
                                       <select class="form-control input-sm m-bot15 sectionid" id="" name="section" type="text">
                                            <option selected="selected">{{$studentedit->section}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Religion </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->religion}}" name="religion" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date of Birth </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->birth_certificate}}" name="bdate" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender </label>
                                    <div class="col-sm-6">

                                        <select class="form-control input-sm m-bot15" id="gender" name="gender" type="text">
                                            <option value="{{$studentedit->gender}}" selected="selected">{{$studentedit->gender}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->email}}" name="email" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->phone}}" name="phone" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$studentedit->address}}" name="address" class="form-control round-input">
                                    </div>
                                </div>

                                <br> <div class="price-actions">
                                    <button type="submit" class="btn">Update Information</button>

                                </div>

                                {!!Form::close()!!}

                            </div>

                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Last Update: {{$studentedit->updated_at}}</b>
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