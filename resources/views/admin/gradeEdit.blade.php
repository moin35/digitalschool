@extends('layouts.submaster')
@section('title')
Grade Edit
@stop
@section('head')

@stop

@section('body')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Grade  Edit Information
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

                <section class="panel">

                    <div class="panel-body">

                        <br><br>
                        <div class="form">

                            <div class="cmxform form-horizontal " id="signupFormt1">

                                <div class="form-group ">
                                    <label for="icode" class="control-label col-lg-3">Grade Name</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" value="{{$getEditGrade->grade_name}}" name="GradeName" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="institute_name" class="control-label col-lg-3">Grade Point</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="{{$getEditGrade->grade_point}}" name="GradePoint" type="text" />
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="institute_name" class="control-label col-lg-3">Mark From</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="{{$getEditGrade->mark_form}}" name="MarkFrom" type="text" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="institute_name"  class="control-label col-lg-3">Mark Upto</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="{{$getEditGrade->mark_upto}}"  name="MarkUpto" type="text" />
                                    </div>
                                </div>

                                 <div class="form-group">
                                 <label class="col-sm-3 control-label">Note</label>
                                 <div class="col-sm-6">
                                     <textarea class="form-control" value="{{$getEditGrade->note}}" name="MarkNote" rows="6">{{$getEditGrade->note}}</textarea>
                                 </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                {!!Form::close()!!}
            </div>
        </section>





    </div>
</div>





@stop
