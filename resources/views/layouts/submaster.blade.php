<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="{{URL::to('/')}}/images/faveicon.png">
    <title>@yield('title')</title>

    <!--Core CSS -->
    <link href="{{URL::to('/')}}/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- DATE PICKER AND FILE UPLOAD START
    <link rel="stylesheet" href="{{URL::to('/')}}//css/bootstrap-switch.css" />-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/select2/select2.css" />
    <!-- DATE PICKER AND FILE UPLOAD end -->
<!-- Data Table CSS start -->
    <!--dynamic table-->
    <link href="{{URL::to('/')}}/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::to('/')}}/js/data-tables/DT_bootstrap.css" />
    <!-- Data Table CSS End -->
    <!-- Custom styles for this template -->
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style-responsive.css" rel="stylesheet" />


 <!-- Bootstrap CSS v3.0.0 or higher -->

<!-- FormValidation CSS file --><script src="{{URL::to('/')}}/multiinputfield/vendor/formValidation.min.js"></script>

<!--
    <link href="{{URL::to('/')}}/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/js/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" href="{{URL::to('/')}}/js/data-tables/DT_bootstrap.css" />
    -->
    @yield('head')
</head>
<body>
<section id="container" >
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">

            <a href="{{URL::to('/')}}" class="logo">
                <img src="{{URL::to('/')}}/images/logo.png" alt="">
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-success">8</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p class="">You have 8 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>25% , Deadline  12 June’13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Product Delivery</h5>
                                        <p>45% , Deadline  12 June’13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Payment collection</h5>
                                        <p>87% , Deadline  12 June’13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>33% , Deadline  12 June’13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>

                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">4</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p class="red">You have 4 Mails</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{URL::to('/')}}/images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{URL::to('/')}}/images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{URL::to('/')}}/images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{URL::to('/')}}/images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">3</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <p>Notifications</p>
                        </li>
                        <li>
                            <div class="alert alert-info clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #1 overloaded.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-danger clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #2 overloaded.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-success clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #3 overloaded.</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->


                    <!--search & user info start-->
            <ul class="nav pull-right top-menu">



                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <li class="dropdown language">

                    <a href="{{url('lang/en')}}" class="dropdown-toggle">
                        <img alt="" src="{{URL::to('/')}}/images/flags/us.png">
                        <span class="username">English</span>

                    </a>

                </li>
                <li class="dropdown language">
                    <a href="{{url('lang/bn')}}" class="dropdown-toggle">
                        <img alt="" src="{{URL::to('/')}}/images/flags/bd.png">
                        <span class="username">বাংলা</span>

                    </a>

                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{URL::to('/')}}/images/avatar1_small.jpg">
                        <span class="username">{{Auth::user()->user_name}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="{{URL::to('auth/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
                <li>
                    <div class="toggle-right-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </li>
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    @if(Auth::check())
                        @if(Auth::user()->priv==1)
                            <li>
                                <a href="{{URL::to('admin/institute/registration')}}">
                                    <i class="fa fa-building-o"></i>
                                    <span>{{Lang::get('home.institute')}} </span>
                                </a>
                            </li>
                        @endif
                    @endif
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span>Student Addmission</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('add/student')}}">{{Lang::get('home.student')}}</a></li>
                            <li><a href="{{URL::to('admin/add/parents')}}">{{Lang::get('home.parents')}}</a></li>
                            <!-- <li><a href="dynamic_table.html">Dynamic Table</a></li>
                             <li><a href="editable_table.html">Editable Table</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="{{URL::to('admin/add/teacher')}}">
                            <i class="fa fa-group"></i>
                            <span>{{Lang::get('home.teacher')}} </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL::to('user/index')}}">
                            <i class="fa fa-user"></i>
                            <span>{{Lang::get('home.user')}} </span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Basic Info</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('Addclass')}}">{{Lang::get('home.class')}}</a></li>
                            <li><a href="{{URL::to('admin/add/subject')}}">{{Lang::get('home.subject')}}</a></li>
                            <li><a href="{{URL::to('sectionAdd')}}">{{Lang::get('home.section')}}</a></li>
                            <li><a href=" {{URL::to('admin/add/routine')}}">Add Class Routine</a></li>
                            <li><a href="{{URL::to('admin/set/in/out/time')}}">Institute Official time Schedule</a></li>
                            <!--      <li><a href="file_upload.html">Muliple File Upload</a></li>
                               <li><a href="dropzone.html">Dropzone</a></li>
                               <li><a href="inline_editor.html">Inline Editor</a></li>
                           -->
                        </ul>

                    </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-laptop"></i>
                                <span>{{Lang::get('home.layout')}}</span>
                            </a>
                            <ul class="sub">

                                <li><a href="{{URL::to('/admin/add/exam')}}">Exam</a></li>
                                <li><a href="{{URL::to('admin/add/exam/schedule')}}">Add Exam Schedule</a></li>
                                <li><a href="{{URL::to('mark/index')}}">{{Lang::get('home.mark')}}</a></li>
                                <li><a href="{{URL::to('grade/index')}}">{{Lang::get('home.grade')}}</a></li>
                            </ul>
                        </li>
                            <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-laptop"></i>
                                <span>Attendance</span>
                            </a>
                            <ul class="sub">


                                <li><a href="{{URL::to('students/attendence/Index')}}">Student Attendance</a></li>
                                <li><a href="{{URL::to('teacher/attendence')}}">Teacher Attendance</a></li>
                                <li><a href="{{URL::to('grade/index')}}">OtherUsers Attendance</a></li>
                                <li><a href="{{URL::to('attendence/result/teacher')}}">Teacher Attendance Report</a></li>
                            </ul>
                        </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>{{Lang::get('home.account')}}</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/add/account/fee/type')}}">Add Fee Type</a></li>
                            <li><a href="{{URL::to('admin/add/invoice')}}">Create Invoice</a></li>
                            <li><a href="{{URL::to('admin/view/balance')}}">Balance</a></li>
                            <li><a href="{{URL::to('admin/add/Expense')}}">Expense</a></li>
                        </ul>
                    </li>
                        <li>
                            <a href="{{URL::to('public/library')}}">
                                <i class="fa fa-book"></i>
                                <span>Library </span>
                            </a>
                        </li>
                        @if(Auth::check())
                            @if(Auth::user()->priv==3)
                                <li>
                                    <a href="{{URL::to('Institute/Setting')}}">
                                        <i class="fa fa-bullhorn"></i>
                                        <span>Institute Setting </span>
                                    </a>
                                </li>
                                @endif
                                @endif


                    <!--       <li class="sub-menu">
                               <a href="javascript:;">
                                   <i class="fa fa-envelope"></i>
                                   <span>Mail </span>
                               </a>
                               <ul class="sub">
                                   <li><a href="mail.html">Inbox</a></li>
                                   <li><a href="mail_compose.html">Compose Mail</a></li>
                                   <li><a href="mail_view.html">View Mail</a></li>
                               </ul>
                           </li>
                           <li class="sub-menu">
                               <a href="javascript:;">
                                   <i class=" fa fa-bar-chart-o"></i>
                                   <span>Charts</span>
                               </a>
                               <ul class="sub">
                                   <li><a href="morris.html">Morris</a></li>
                                   <li><a href="chartjs.html">Chartjs</a></li>
                                   <li><a href="flot_chart.html">Flot Charts</a></li>
                                   <li><a href="c3_chart.html">C3 Chart</a></li>
                               </ul>
                           </li>
                           <li class="sub-menu">
                               <a href="javascript:;">
                                   <i class=" fa fa-bar-chart-o"></i>
                                   <span>Maps</span>
                               </a>
                               <ul class="sub">
                                   <li><a href="google_map.html">Google Map</a></li>
                                   <li><a href="vector_map.html">Vector Map</a></li>
                               </ul>
                           </li>
                           <li class="sub-menu">
                               <a href="javascript:;">
                                   <i class="fa fa-glass"></i>
                                   <span>Extra</span>
                               </a>
                               <ul class="sub">
                                   <li><a href="blank.html">Blank Page</a></li>
                                   <li><a href="lock_screen.html">Lock Screen</a></li>
                                   <li><a href="profile.html">Profile</a></li>
                                   <li><a href="invoice.html">Invoice</a></li>
                                   <li><a href="pricing_table.html">Pricing Table</a></li>
                                   <li><a href="timeline.html">Timeline</a></li>
                                   <li><a href="gallery.html">Media Gallery</a></li><li><a href="404.html">404 Error</a></li>
                                   <li><a href="500.html">500 Error</a></li>
                                   <li><a href="registration.html">Registration</a></li>
                               </ul>
                           </li> -->
                           <li>

                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                    </li>
                </ul>     </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->

            @yield('body')
        </section>
    </section>
    <!--main content end-->
    <!--right sidebar start-->
    <div class="right-sidebar">
        <div class="search-row">
            <input type="text" placeholder="Search" class="form-control">
        </div>
        <div class="right-stat-bar">
            <ul class="right-side-accordion">
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head red-bg active clearfix">
                        <span class="pull-left">work progress (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row side-mini-stat clearfix">
                                <div class="side-graph-info">
                                    <h4>Target sell</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="target-sell">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>product delivery</h4>
                                    <p>
                                        55%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-delivery">
                                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info payment-info">
                                    <h4>payment collection</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-collection">
						<span class="pc-epie-chart" data-percent="45">
						<span class="percent"></span>
						</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>delivery pending</h4>
                                    <p>
                                        44%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="d-pending">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="col-md-12">
                                    <h4>total progress</h4>
                                    <p>
                                        50%, Deadline 12 june 13
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head terques-bg active clearfix">
                        <span class="pull-left">contact online (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Jonathan Smith</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Anjelina Joe</a></h4>
                                    <p>
                                        Available
                                    </p>
                                </div>
                                <div class="user-status text-success">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/chat-avatar2.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">John Doe</a></h4>
                                    <p>
                                        Away from Desk
                                    </p>
                                </div>
                                <div class="user-status text-warning">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Mark Henry</a></h4>
                                    <p>
                                        working
                                    </p>
                                </div>
                                <div class="user-status text-info">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Shila Jones</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <p class="text-center">
                                <a href="#" class="view-btn">View all Contacts</a>
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head purple-bg active">
                        <span class="pull-left"> recent activity (3)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        just now
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        2 min ago
                                    </p>
                                    <p>
                                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        1 day ago
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head yellow-bg active">
                        <span class="pull-left"> shipment status</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="col-md-12">
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--right sidebar end-->

</section>

<!--Core js-->
<script src="{{URL::to('/')}}/js/jquery.js"></script>
<script src="{{URL::to('/')}}/js/jquery-1.8.3.min.js"></script>
<!-- jQuery v1.9.1 or higher -->
<script type="text/javascript" src="{{URL::to('/')}}/multiinputfield/jquery.min.js"></script>
<script src="{{URL::to('/')}}/bs3/js/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="{{URL::to('/')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{URL::to('/')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{URL::to('/')}}/js/easypiechart/jquery.easypiechart.js"></script>
<script src="{{URL::to('/')}}/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="{{URL::to('/')}}/js/jquery.nicescroll.js"></script>
<script src="{{URL::to('/')}}/js/jquery.nicescroll.js"></script>

<script src="{{URL::to('/')}}/js/bootstrap-switch.js"></script>

<script type="text/javascript" src="{{URL::to('/')}}/js/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="{{URL::to('/')}}/js/jquery-tags-input/jquery.tagsinput.js"></script>

<script src="{{URL::to('/')}}/js/select2/select2.js"></script>
<script src="{{URL::to('/')}}/js/select-init.js"></script>


<!--common script init for all pages-->
<script src="{{URL::to('/')}}/js/scripts.js"></script>
<!--dynamic table-->
<script type="text/javascript" src="{{URL::to('/')}}/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/data-tables/DT_bootstrap.js"></script>
<script src="{{URL::to('/')}}/js/toggle-init.js"></script>

<script src="{{URL::to('/')}}/js/advanced-form.js"></script>
<!--Easy Pie Chart-->
<script src="{{URL::to('/')}}/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="{{URL::to('/')}}/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.resize.js"></script>
<script src="{{URL::to('/')}}/js/flot-chart/jquery.flot.pie.resize.js"></script>

<!-- validition script -->
<script type="text/javascript" src="{{URL::to('/')}}/js/jquery.validate.min.js"></script>
<script src="{{URL::to('/')}}/js/validation-init.js"></script>

<script src="{{URL::to('/')}}/js/jquery-steps/jquery.steps.js"></script>
<script src="{{URL::to('/')}}/js/table-editable.js"></script>
<script src="{{URL::to('/')}}/js/gritter.js" type="text/javascript"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/gritter/js/jquery.gritter.js"></script>
<!-- start Dynamic Tables JAVASCRIPTS -->
<script type="text/javascript" language="javascript" src="{{URL::to('/')}}/js/advanced-datatable/js/jquery.dataTables.js"></script>

<!--dynamic table initialization start-->
<script src="{{URL::to('/')}}/js/dynamic_table_init.js"></script>
<!--dynamic table initialization end-->

<!-- END JAVASCRIPTS -->


<script>
    jQuery(document).ready(function($){
        n=1;
        $('.class').change(function(){
            $.get("{{ url('api/dropdown/section')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('.sectionid');
                        model.empty();
                        $.each(data, function(index,element) {
                        //  alert(data);
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });
                    });
        });
    });
</script>

<script>
    jQuery(document).ready(function($){
        n=1;
        $('#make').change(function(){
            $.get("{{ url('api/dropdown')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('.model');
                        model.empty();
                        model.append("<option>" + "Select District/Zilla" + "</option>");
                        $.each(data, function(index,element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");

                        });
                    });
        });
   });
    </script>



<script>
    jQuery(document).ready(function($){
        n=1;
        $('.model').change(function(){
            $.get("{{ url('api/dropdown/thana')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('#idthana');
                        model.empty();
                          model.append("<option>" + "Select Thana/Upazilla" + "</option>");
                        $.each(data, function(index,element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });
                    });
        });
    });
</script>


<!--saif add for Mark  -->
<script>
   jQuery(document).ready(function($){
       n=1;
       $('#classid').change(function(){
           $.get("{{ url('api/dropdown/subject')}}",
                   { option: $(this).val() },
                   function(data) {
                       var model = $('#subject_code');
                 //console.log(model);

                       model.empty();
                        $.each(data, function(index,element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });

                   });
       });
   });
 </script>



<script>
    jQuery(document).ready(function($){
        n=1;
        $('.class').change(function(){
            $.get("{{ url('api/dropdown/sub')}}",
                    { option: $(this).val() },
                    function(data) {

                        var model = $('.subject');
                        model.empty();
                        $.each(data, function(index,element) {
                          //  alert(data);
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });
                    });
        });
    });

</script>

<!-- for invoice add -->
<script>
    jQuery(document).ready(function($){
        n=1;
        $('.invoiceclass').change(function(){
            $.get("{{ url('api/dropdown/invoice')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('.invoicestudent');
                        model.empty();
                        $.each(data, function(index,element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });
                    });
        });
    });

</script>
<script>
    jQuery(document).ready(function($){
        n=1;
        $('.invoiceclass').change(function(){
            $.get("{{ url('api/dropdown/invoice/section')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('.invoicesection');
                        model.empty();
                        $.each(data, function(index,element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });
                    });
        });
    });

</script>
<script language="JavaScript" type="text/javascript">

 $(function(){
$('#addAllMarks').on('submit',function(e){
    $.ajaxSetup({
        header:$('meta[name="_token"]').attr('content')
    })
    e.preventDefault(e);

        $.ajax({
        type:"POST",
        url:'/mark/add/all/',
        data:$(this).serialize(),
        dataType: 'json',
        success:function(data){

    			$("#msj-success").fadeIn();

    					},
    		error:function(data){
    			$("#msj").html(msj.responseJSON.genre);
    			$("#msj-error").fadeIn();
    		}
    })
    });
});
 </script>
 <script language="JavaScript" type="text/javascript">

 $(document).ready(function () {
     $('#ascuisines').on('change', function () {
         $('#getcuisines').val($(this).val().join());
     }).trigger('change');
 });
 </script>
 <script language="JavaScript" type="text/javascript">

 $(document).ready(function () {
     $('#holyascuisines').on('change', function () {
         $('#holygetcuisines').val($(this).val().join());
     }).trigger('change');
 });
 </script>
   <script src="{{URL::to('/')}}/ajaxjs/exprence.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/ajaxjs/attendance.js" type="text/javascript"></script>
 <script language="JavaScript" type="text/javascript">

  $(function(){
 $('#iiSetting').on('submit',function(e){
     $.ajaxSetup({
         header:$('meta[name="_token"]').attr('content')
     })
     e.preventDefault(e);

         $.ajax({
         type:"POST",
         url:'/Institute/Setting',
         data:$(this).serialize(),
         dataType: 'json',
         success:function(data){

     			$("#msj-success").fadeIn();

     					},
     		error:function(data){
     			$("#msj").html(msj.responseJSON.genre);
     			$("#msj-error").fadeIn();
     		}
     })
     });
 });
  </script>
 <script type="text/javascript">
 $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
 });
 </script>


<!-- Bootstrap JS -->

<!-- multiple input fields add remove JS -->

<script src="{{URL::to('/')}}/multiinputfield/formValidation.min.js"></script>

<script src="{{URL::to('/')}}/multiinputfield/bootstrap.min.js"></script>
<script src="{{URL::to('/')}}/multiinputfield/bootstrap-datepicker.min.js"></script>


<script src="{{URL::to('/')}}/multiinputfield/viewinputdate.js"></script>
<script src="{{URL::to('/')}}/multiinputfield/selectaddremove.js"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

@section('scripts')

@show
</body>
</html>
