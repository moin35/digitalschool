@extends('layouts.submaster')
@section('title')
 Edit | User
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
                      @if(Session::has('toastr.alerts'))
          <div id="toastr">
          @foreach(Session::get('toastr.alerts') as $alert)

              <div class='alert alert-{{ $alert['type'] }} @if(array_get($alert,'params.important') == true) important @endif'>
                  <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>

                  @if( ! empty($alert['title']))
                      <div><strong>{{ $alert['title'] }}</strong></div>
                  @endif

                  {{ $alert['message'] }}

                  @if(array_get($alert,'params.important')) (This alert is marked as important) @endif

              </div>

          @endforeach
          </div>
      @endif           <div class="pricing-table most-popular">
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">Institute Code:{{$editUser->institute_code}}</a>
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
                                                        <img src="{{URL::to('/')}}/images/{{$editUser->image}}" alt="" />
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
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$editUser->name}}" name="name" id="name" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date of Birth</label>
                                    <div class="col-sm-6">
                                      <input  name="dbirth" id="dbirth"  class="form-control default-date-picker"  size="16" type="text" value="{{$editUser->birth_date}}" />

                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender </label>
                                    <div class="col-sm-6">

                                        <select class="form-control input-sm m-bot15" id="gender" name="gender" type="text">
                                            <option value="{{$editUser->gender}}" selected="selected">{{$editUser->gender}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Religion </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$editUser->religio}}" name="Religion" id="Religion" class="form-control round-input">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Type </label>
                                    <div class="col-sm-6">
                                       <select class="form-control input-sm m-bot15 sectionid" id="" name="utype" type="text">
                                            <option selected="selected" value="{{$editUser->user_type}}">{{$editUser->user_type}}</option>
                                            <option value="Accountant">Accountant</option>
                                            <option value="Librarian">Librarian</option>
                                             <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                   <div class="form-group">
                                    <label class="col-sm-3 control-label">Joining Date</label>
                                    <div class="col-sm-6">
                                      <input  id="jobinDate" name="jobinDate"  class="form-control default-date-picker"  size="16" type="text" value="{{$editUser->birth_date}}" />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$editUser->email}}" name="email" id="email" class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$editUser->phone}}" name="phone" id="phone"   class="form-control round-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$editUser->address}}" name="address" id="address" class="form-control round-input">
                                    </div>
                                </div>

                                <br> <div class="price-actions">
                                    <button type="submit" class="btn"  >Update Information</button>

                                </div>

                                {!!Form::close()!!}

                            </div>

                        </div>
                        <div class="text-center">
                            <b>  <i class="fa fa-check"></i>Last Update: {{$editUser->updated_at}}</b>
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
