@extends('layouts.submaster')
@section('title')
Set Permission
@stop
@section('head')
    <meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('body')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Set Permission
            </header>
            <div class="panel-body">
                @if(Session::get('data'))
                <div class="bs-example" >
                    <div id="BodyField" class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>{{Session::get('data')}}</strong>.
                    </div>
                </div>
                @endif


                {!! Form::open(array('id'=>'allocation','class'=>'form-horizontal bucket-form')) !!}

                <section class="panel">

                    <div class="panel-body">
                      <div id="msj-success"  class="alert alert-success fade in" role="alert" style="display:none">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Successful</strong>.
                      </div>
                        <br><br>
                        <div class="form">

                            <div class="cmxform form-horizontal " id="signupFormt1">

                                <div class="form-group ">
                                    <label for="icode" class="control-label col-lg-3">{{$editExpense->name}}</label>
                                    <input name="teacherid" type="hidden" value="{{$editExpense->uid}}"> {{$editExpense->uid}}
                                    <div class="col-lg-6">
                                        <input class="form-control" value="{{$editExpense->id}}" name="expensesName" id="eid" type="hidden" />
                                        </div>
                                </div>
                                    <table class="table table-hover table-bordered" id="">
                                        <thead>
                                        <tr>
                                    <th colspan="{{$scount}}">shift</th>
                                    <th>Attdence</th>
                                    <th>Addmission</th>
                                    <th>Teacher Add</th>
                                    <th>Subject Add</th>
                                    <th>Exam Schedule</th>
                                    <th>Class Routine</th>
                                    <th>Notice</th>
                                    <th>SMS</th>
                                    
                                        </tr>
                                        </thead>
                                        <tbody>
                                
                                        <tr>
                                        @foreach($sget as $d => $v)

                                            <td>{{$v->shift}}<input value="{{$v->id}}" type='checkbox' class='checkbox' name="shift"> </td>
                                        @endforeach
                                           <td>
                                    @if($editExpense->attdence==1)
                                      <input value="1" type='checkbox' class='checkbox' onchange='this.form.submit()' name="attendence" checked="checked">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' onchange='this.form.submit()' name="attendence" >
                                    @endif
                                           </td>
                                           <td>
                                 @if($editExpense->addmission==1)
                                      <input value="1" type='checkbox' class='checkbox' onchange='this.form.submit()' name="addmission" checked="checked">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' onchange='this.form.submit()' name="addmission" >
                                    @endif
                                           </td>
                                           <td>
                                 @if($editExpense->teacheradd==0)
                                      <input value="1" type='checkbox' class='checkbox' name="teacheradd[]">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' name="teacheradd[]" checked="checked">
                                  @endif
                                           </td>
                                           <td>
                                    @if($editExpense->subjectadd==0)
                                      <input value="1" type='checkbox' class='checkbox' name="subjectadd[]">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' name="subjectadd[]" checked="checked">
                                  @endif
                                           </td>
                                           <td>
                                    @if($editExpense->examschedule==0)
                                      <input value="1" type='checkbox' class='checkbox' name="examschedule[]">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' name="examschedule[]" checked="checked">
                                  @endif
                                           </td>
                                           <td>
                                    @if($editExpense->classroutine==0)
                                      <input value="1" type='checkbox' class='checkbox' name="classroutine[]">
                                    @else
                                       <input value="0" type='checkbox' class='checkbox' name="classroutine[]" checked="checked">
                                        @endif
                                     </td>
                                    <td>
                                        @if($editExpense->notice==0)
                                      <input value="1" type='checkbox' class='checkbox' name="notice[]">
                                        @else
                                       <input value="0" type='checkbox' class='checkbox' name="notice[]" checked="checked">
                                        @endif
                                    </td>
                                    <td>
                                    @if($editExpense->sms==0)
                                      <input value="1" type='checkbox' class='checkbox' name="sms[]">
                                         @else
                                       <input value="0" type='checkbox'  class='checkbox' name="sms[]" checked="checked">
                                    @endif
                                           </td>
                                          
                                        </tr>
                                   
                                        </tbody>
                                    </table>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                         <noscript><button class="btn btn-primary" type="submit" >Update</button></noscript>
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



<script>
$("#BodyField").delay(5000).fadeOut();
</script>

@stop
