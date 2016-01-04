@extends('layouts.submaster')
@section('title')
Class Edit
@stop
@section('head')

@stop

@section('body') 
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Class  Edit Information
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


                {!! Form::open(array('id'=>'classupdate','class'=>'form-horizontal bucket-form')) !!}

                <div class="form-group">
                    <label class="col-sm-3 control-label">Teacher Name</label>
                    <div class="col-sm-6">
                        <select class="form-control input-lg m-bot15" name="teachername">
                            <option >{{$classupdate->teacher_name}}</option>
                            @foreach($teacher as $r=>$t)
                            <option value="{{$t}}">{{$r}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Class Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="classname" value="{{$classupdate->class_name}}" class="form-control round-input">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Class Numeric</label>
                    <div class="col-sm-6">
                        <input type="text" name="classnumaric" value="{{$classupdate->class_name_numaric}}" class="form-control round-input">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-6">
                          <textarea class="form-control" name="ClassNote"  rows="6">{{$classupdate->note}}</textarea>
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