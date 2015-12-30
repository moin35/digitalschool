@extends('layouts.submaster')
@section('title')
    Add Parents
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">
@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Parents
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div ng-app="app" ng-controller="TestCtrl as test">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a class="btn btn-primary" ng-click="test.showBoxOne = !test.showBoxOne" >
                                        Add Parents <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                                <div class="box-one" ng-show="test.showBoxOne">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Parents
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                                                </header>
                                                <div class="panel-body">
                                                    {!! Form::open(array('id'=>'signupFormt','class'=>'cmxform form-horizontal')) !!}
                                                    <div class="form" >
                                                        <div class="form-group ">
                                                            <label for="gname" class="control-label col-lg-3">Guardian Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="gname" name="gname" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="father_name" class="control-label col-lg-3">Father's Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="father_name" name="father_name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="mother_name" class="control-label col-lg-3">Mother's Name</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="mother_name" name="mother_name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="father_profession" class="control-label col-lg-3">Father's Profession</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="father_profession" name="father_profession" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="mother_profession" class="control-label col-lg-3">Mother's Profession</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="mother_profession" name="mother_profession" type="text" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="religion " class="control-label col-lg-3">Religion </label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="religion" name="religion" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="address" class="control-label col-lg-3">Address</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="address" name="address" type="text" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="email" class="control-label col-lg-3">Email</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control " id="email" name="email" type="email" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="phone" class="control-label col-lg-3">Phone</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="phone" name="phone" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group last">
                                                            <label class="control-label col-md-3">Image Upload</label>
                                                            <div class="col-md-9">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                    <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" />
                                                   </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                                    </div>
                                                                </div>
                                                                <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="username" class="control-label col-lg-3">Username</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control " id="username" name="username" type="text" />
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

                                                    </div>
                                                    {!!Form::close()!!}

                                                </div>

                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="space15"></div>

                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="list-group-item list-group-item-warning">
                            <form style="" class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label">
                                        Class                                </label>
                                    <div class="col-sm-6">
                                        <select name="classesID" id="classesID" class="form-control">
                                            <option value="0">Select Class</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                            <option value="6">Six</option>
                                            <option value="7">Seven</option>
                                            <option value="8">Eight</option>
                                            <option value="9">Nine</option>
                                            <option value="10">Ten</option>
                                        </select>                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    Flip Scroll
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <section id="flip-scroll">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th>Code</th>
                                <th>Company</th>
                                <th class="numeric">Price</th>
                                <th class="numeric">Change</th>
                                <th class="numeric">Change %</th>
                                <th class="numeric">Open</th>
                                <th class="numeric">High</th>
                                <th class="numeric">Low</th>
                                <th class="numeric">Volume</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                <td class="numeric">$1.38</td>
                                <td class="numeric">-0.01</td>
                                <td class="numeric">-0.36%</td>
                                <td class="numeric">$1.39</td>
                                <td class="numeric">$1.39</td>
                                <td class="numeric">$1.38</td>
                                <td class="numeric">9,395</td>
                            </tr>
                            <tr>
                                <td>AAD</td>
                                <td>ARDENT LEISURE GROUP</td>
                                <td class="numeric">$1.15</td>
                                <td class="numeric">  +0.02</td>
                                <td class="numeric">1.32%</td>
                                <td class="numeric">$1.14</td>
                                <td class="numeric">$1.15</td>
                                <td class="numeric">$1.13</td>
                                <td class="numeric">56,431</td>
                            </tr>
                            <tr>
                                <td>AAX</td>
                                <td>AUSENCO LIMITED</td>
                                <td class="numeric">$4.00</td>
                                <td class="numeric">-0.04</td>
                                <td class="numeric">-0.99%</td>
                                <td class="numeric">$4.01</td>
                                <td class="numeric">$4.05</td>
                                <td class="numeric">$4.00</td>
                                <td class="numeric">90,641</td>
                            </tr>
                            <tr>
                                <td>ABC</td>
                                <td>ADELAIDE BRIGHTON LIMITED</td>
                                <td class="numeric">$3.00</td>
                                <td class="numeric">  +0.06</td>
                                <td class="numeric">2.04%</td>
                                <td class="numeric">$2.98</td>
                                <td class="numeric">$3.00</td>
                                <td class="numeric">$2.96</td>
                                <td class="numeric">862,518</td>
                            </tr>
                            <tr>
                                <td>ABP</td>
                                <td>ABACUS PROPERTY GROUP</td>
                                <td class="numeric">$1.91</td>
                                <td class="numeric">0.00</td>
                                <td class="numeric">0.00%</td>
                                <td class="numeric">$1.92</td>
                                <td class="numeric">$1.93</td>
                                <td class="numeric">$1.90</td>
                                <td class="numeric">595,701</td>
                            </tr>
                            <tr>
                                <td>ABY</td>
                                <td>ADITYA BIRLA MINERALS LIMITED</td>
                                <td class="numeric">$0.77</td>
                                <td class="numeric">  +0.02</td>
                                <td class="numeric">2.00%</td>
                                <td class="numeric">$0.76</td>
                                <td class="numeric">$0.77</td>
                                <td class="numeric">$0.76</td>
                                <td class="numeric">54,567</td>
                            </tr>
                            <tr>
                                <td>ACR</td>
                                <td>ACRUX LIMITED</td>
                                <td class="numeric">$3.71</td>
                                <td class="numeric">  +0.01</td>
                                <td class="numeric">0.14%</td>
                                <td class="numeric">$3.70</td>
                                <td class="numeric">$3.72</td>
                                <td class="numeric">$3.68</td>
                                <td class="numeric">191,373</td>
                            </tr>
                            <tr>
                                <td>ADU</td>
                                <td>ADAMUS RESOURCES LIMITED</td>
                                <td class="numeric">$0.72</td>
                                <td class="numeric">0.00</td>
                                <td class="numeric">0.00%</td>
                                <td class="numeric">$0.73</td>
                                <td class="numeric">$0.74</td>
                                <td class="numeric">$0.72</td>
                                <td class="numeric">8,602,291</td>
                            </tr>
                            <tr>
                                <td>AGG</td>
                                <td>ANGLOGOLD ASHANTI LIMITED</td>
                                <td class="numeric">$7.81</td>
                                <td class="numeric">-0.22</td>
                                <td class="numeric">-2.74%</td>
                                <td class="numeric">$7.82</td>
                                <td class="numeric">$7.82</td>
                                <td class="numeric">$7.81</td>
                                <td class="numeric">148</td>
                            </tr>
                            <tr>
                                <td>AGK</td>
                                <td>AGL ENERGY LIMITED</td>
                                <td class="numeric">$13.82</td>
                                <td class="numeric">  +0.02</td>
                                <td class="numeric">0.14%</td>
                                <td class="numeric">$13.83</td>
                                <td class="numeric">$13.83</td>
                                <td class="numeric">$13.67</td>
                                <td class="numeric">846,403</td>
                            </tr>
                            <tr>
                                <td>AGO</td>
                                <td>ATLAS IRON LIMITED</td>
                                <td class="numeric">$3.17</td>
                                <td class="numeric">-0.02</td>
                                <td class="numeric">-0.47%</td>
                                <td class="numeric">$3.11</td>
                                <td class="numeric">$3.22</td>
                                <td class="numeric">$3.10</td>
                                <td class="numeric">5,416,303</td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->


    <script>
        function TestCtrl() {
            var self = this;

            self.showBoxOne = false;
            self.showBoxTwo = false;


        }

        angular.module('app', ['ngAnimate'])
                .controller('TestCtrl', TestCtrl)
    </script>
@stop
       