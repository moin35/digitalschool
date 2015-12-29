@extends('layouts.submaster')
@section('title')
    Institute | Registration
@stop
@section('head')

@stop

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Advanced Form validations
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="signupFormt1" method="post" action="">
                            {!! csrf_field() !!}
                            <div class="form-group ">
                                <label for="institute_name" class="control-label col-lg-3">Institute name</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="institute_name" name="institute_name" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="iusername" class="control-label col-lg-3">Username</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="iusername" name="iusername" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="icode" class="control-label col-lg-3">Institute Code</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="icode" name="icode" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="iphone" class="control-label col-lg-3">Institute Address</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="iphone" name="iphone" type="text" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Password</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="password" name="password" type="password" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="iphone" class="control-label col-lg-3">Institute Phone No.</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="iphone" name="iphone" type="number" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Email</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="email" name="email" type="email" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="agree" class="control-label col-lg-3 col-sm-3">Agree to Our Policy</label>
                                <div class="col-lg-6 col-sm-9">
                                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="newsletter" class="control-label col-lg-3 col-sm-3">Receive the Newsletter</label>
                                <div class="col-lg-6 col-sm-9">
                                    <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
