@extends('layouts.submaster')
@section('title')
Section Edit
@stop
@section('head')

@stop

@section('body') 
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Section  Edit Information
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


                {!! Form::open(array('id'=>'editsection','class'=>'form-horizontal bucket-form')) !!}

                <div class="form-group">
                    <label class="col-sm-3 control-label">Teacher Name</label>
                    <div class="col-sm-6">
                        <select class="form-control input m-bot15" name="teachername">
                            <option value="{{$editsection->tearcher_id}}">{{$editsection->tearcher_id}}</option>
                            @foreach($teacher as $r=>$t)
                            <option value="{{$t}}">{{$r}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Class Name</label>
                    <div class="col-sm-6">
                        <select class="form-control input m-bot15" name="classname">                            
                            @foreach($classlist as $r=>$t)                            
                            @if($editsection->class_id==$t)
                            <option value="{{$t}}" selected="selected" >{{$r}} </option>
                            @else
                              <option value="{{$t}}">{{$r}}</option>
                            @endif
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Class Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="sectionname" value="{{$editsection->section_name}}" class="form-control round-input">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Class Numeric</label>
                    <div class="col-sm-6">
                        <input type="text" name="sectioncategory" value="{{$editsection->section_category}}" class="form-control round-input">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-6">
                          <textarea class="form-control" name="sectionNote"  rows="6">{{$editsection->note}}</textarea>
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