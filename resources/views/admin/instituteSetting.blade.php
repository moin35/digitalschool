
@extends('layouts.submaster')
@section('title')
    Setting
@stop
@section('head')

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

                                {!! Form::open(array('id'=>'subjectinfo','class'=>'form-horizontal bucket-form','files'=>'true')) !!}

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">URL</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->url}}" name="name" class="form-control input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Site Title/Name </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{$Isetting->institute_name}}" name="name" class="form-control input">
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

                                <div class="form-group">

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="form-group last">
                                                <label class="control-label col-md-5">Change Logo</label>
                                                <div class="col-md-7">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="{{URL::to('/')}}/images/{{$Isetting->image}}" alt="" />
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

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="form-group last">
                                                <label class="control-label col-md-5">Change Icon</label>
                                                <div class="col-md-7">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="{{URL::to('/')}}/images/{{$Isetting->image}}" alt="" />
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

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="form-group last">
                                                <label class="control-label col-md-5">Change Banner</label>
                                                <div class="col-md-7">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload" id="image" name="image">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="{{URL::to('/')}}/images/{{$Isetting->image}}" alt="" />
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

                                    <div class="col-sm-6">
                                        <div class="row">
                                          <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
                              <div id="drop">
                                  Drop Here

                                  <a>Browse</a>
                                  <input type="file" name="upl" multiple />
                              </div>

                              <ul>
                                  <!-- The file uploads will be shown here -->
                              </ul>

                          </form>
                                        </div>
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
