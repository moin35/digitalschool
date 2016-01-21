@extends('layouts.submaster')
@section('title')
   Exam Edit
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Exam  Edit Information
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


                    {!! Form::open(array('id'=>'classinfo','class'=>'form-horizontal bucket-form')) !!}
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Exam Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="examname" value="{{$editexamview->exam_name}}" class="form-control round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Exam Date</label>
                        <div class="col-sm-6">
                            <input type="text" name="date" value="{{$editexamview->exam_date}}" class="form-control form-control-inline input-medium default-date-picker round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Note</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="note"  rows="6">{{$editexamview->note}}</textarea>
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