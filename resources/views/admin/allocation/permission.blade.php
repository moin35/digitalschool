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
                                    <th colspan="2">Attdence</th>
                                    <th colspan="2">Addmission</th>
                                    <th colspan="2">Teacher Add</th>
                                    <th colspan="2">Subject Add</th>
                                    <th colspan="2">Exam Schedule</th>
                                    <th colspan="2">Class Routine</th>
                                    <th colspan="2">Notice</th>
                                    <th colspan="2">SMS</th>
                                    
                                        </tr>
                                        </thead>
                                        <tbody>
                                
                                        <tr>
                                        
                                               @foreach($sget as $d => $v)
                                            <td> 
                                           @if($editExpense->shift==$v->id)
                                              
                                              {{$v->shift}} <input value="{{$v->id}}" type='radio' class='checkbox' name="shift" checked="checked"> 
                                             @else
                                              {{$v->shift}} <input value="{{$v->id}}" type='radio' class='checkbox' name="shift"> 
                                            
                                                @endif

                                          </td>
                                         @endforeach
                                          
                                    @if($editExpense->attdence==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="attendence" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="attendence" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->attdence==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="attendence" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="attendence" checked="checked"></label>
                                  </td>
                                      @endif 

                                    @if($editExpense->addmission==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="addmission" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="addmission" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->addmission==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="addmission" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="addmission" checked="checked"></label>
                                  </td>
                                      @endif 
                                    @if($editExpense->teacheradd==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="teacheradd" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="teacheradd" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->teacheradd==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="teacheradd" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="teacheradd" checked="checked"></label>
                                  </td>
                                      @endif 
                                       @if($editExpense->subjectadd==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="subjectadd" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="subjectadd" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->subjectadd==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="subjectadd" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="subjectadd" checked="checked"></label>
                                  </td>
                                      @endif 
                                            @if($editExpense->examschedule==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="examschedule" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="examschedule" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->examschedule==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="examschedule" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="examschedule" checked="checked"></label>
                                  </td>
                                      @endif 
                                   @if($editExpense->classroutine==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="classroutine" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="classroutine" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->classroutine==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="classroutine" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="classroutine" checked="checked"></label>
                                  </td>
                                      @endif 
                         @if($editExpense->notice==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="notice" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="notice" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->notice==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="notice" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="notice" checked="checked"></label>
                                  </td>
                                      @endif 
                                                      @if($editExpense->sms==1)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="sms" checked="checked"></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="sms" ></label>
                                  </td>
                                      @endif
                                     @if($editExpense->sms==0)
                                    <td> <label>Yes
                                      <input value="1" type='radio' class='radio'  name="sms" ></label>
                                      </td><td><label> NO: <input value="0" type='radio' class='radio'  name="sms" checked="checked"></label>
                                  </td>
                                      @endif 
                                   
                                        </tr>
                                   
                                        </tbody>
                                    </table>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" >Update</button>
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
