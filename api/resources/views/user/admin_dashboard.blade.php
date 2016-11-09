@extends('layout.master')
@section('page-title')
    School Information System|Welcome
@stop
@section('menus')
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="clearfix"></div>
            <!--- Divider -->
            <div class="clearfix"></div>
            <hr class="divider" />
            <div class="clearfix"></div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href='{{url('home')}}' class='active'>
                            <i class='icon-home-3'></i><span>Dashboard</span> <span class="pull-right"></span></a>
                    </li>
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,1) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-newspaper-o"></i> News and Announcements </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('news/create')}}'><span><i class="fa fa-arrow-right"></i>Create</span></a></li>
                                <li><a href='{{url('news')}}'><span><i class="fa fa-arrow-right"></i>List News</span></a></li>
                                <li><a href='{{url('news/archive')}}'><i class="fa fa-arrow-right"></i><span>News Archive</span></a></li>
                                <li><a href='{{url('news/search')}}'><span><i class="fa fa-arrow-right"></i>Search</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,2) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-building"></i> Schools</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('schools/add')}}'><span><i class="fa fa-arrow-right"></i>School Registration</span></a></li>
                                <li><a href='{{url('schools')}}'><span><i class="fa fa-arrow-right"></i>List Schools</span></a></li>
                                <li><a href='{{url('schools-manage')}}'><span><i class="fa fa-arrow-right"></i>Manage Schools</span></a></li>
                                <li><a href='{{url('users')}}'><span><i class="fa fa-arrow-right"></i>School Users</span></a></li>
                                 <li><a href='{{url('schools/department/list')}}'><span><i class="fa fa-arrow-right"></i>Departments</span></a></li>
                                <li><a href='{{url('schools-reports/')}}'><span><i class="fa fa-arrow-right"></i>General reports</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,3) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-graduation-cap"></i>Admission </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('admission/create')}}'><span><i class="fa fa-arrow-right"></i>Upload Students</span></a></li>
                                <li><a href='{{url('admission')}}'><span><i class="fa fa-arrow-right"></i>List students</span></a></li>
                                <li><a href='{{url('admission/search')}}'><i class="fa fa-arrow-right"></i><span>Search Student</span></a></li>
                                <li><a href='{{url('admission/reports/')}}'><i class="fa fa-arrow-right"></i><span>Students Reports</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,4) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-graduation-cap"></i> Students </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('students/create')}}'><span><i class="fa fa-arrow-right"></i>Register new Students</span></a></li>
                                <li><a href='{{url('students')}}'><span><i class="fa fa-arrow-right"></i>List students</span></a></li>
                                <li><a href='{{url('students/search')}}'><i class="fa fa-arrow-right"></i><span>Search Student</span></a></li>
                                <li><a href='{{url('students/reports/')}}'><i class="fa fa-arrow-right"></i><span>Students Reports</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,5) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-users"></i> Staff </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('staff/create')}}'><span><i class="fa fa-arrow-right"></i>Register new Staff</span></a></li>
                                <li><a href='{{url('staff')}}'><span><i class="fa fa-arrow-right"></i>List staff</span></a></li>
                                <li><a href='{{url('staff/search')}}'><i class="fa fa-arrow-right"></i><span>Search staff</span></a></li>
                                <li><a href='{{url('staff/reports/')}}'><i class="fa fa-arrow-right"></i><span>Staff reports</span></a></li>

                            </ul>
                        </li>
                    @endif

                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,6) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span> <i class="fa fa-book"></i> Courses/Subjects </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('courses/create')}}'><span><i class="fa fa-arrow-right"></i>Register new course</span></a></li>
                                <li><a href='{{url('courses')}}'><span><i class="fa fa-arrow-right"></i>List Courses</span></a></li>
                                <li><a href='{{url('courses/search')}}'><i class="fa fa-arrow-right"></i><span>Search Courses</span></a></li>
                                <li><a href='{{url('courses/reports/')}}'><i class="fa fa-arrow-right"></i><span>Courses reports</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,7) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-newspaper-o"></i> Academic Setup</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('academic/current-year')}}'><span><i class="fa fa-arrow-right"></i>Current Year</span></a></li>
                                <li><a href='{{url('academic/edu-levels')}}'><span><i class="fa fa-arrow-right"></i>Education Levels</span></a></li>
                                <li><a href='{{url('academic/classes')}}'><span><i class="fa fa-arrow-right"></i>Classes and Streams</span></a></li>
                                <li><a href='{{url('academic/grade')}}'><span><i class="fa fa-arrow-right"></i>Grade setup</span></a></li>
                                <li><a href='{{url('academic/examination-types')}}'><i class="fa fa-arrow-right"></i><span>Examination types</span></a></li>
                                <li><a href='{{url('academic/examination-period')}}'><span><i class="fa fa-arrow-right"></i>Examination Period</span></a></li>
                                <li><a href='{{url('academic/academic-calendar')}}'><span><i class="fa fa-arrow-right"></i>Academic Calendar</span></a></li>
                                <li><a href='{{url('academic/subject-allocation')}}'><span><i class="fa fa-arrow-right"></i>Subject Allocation</span></a></li>
                                <li><a href='{{url('academic/class-allocation')}}'><span><i class="fa fa-arrow-right"></i>Class Allocation</span></a></li>
                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,8) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-newspaper-o"></i> Academic</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('academics/student-progress')}}'><span><i class="fa fa-arrow-right"></i>Student Progress</span></a></li>
                                <li><a href='{{url('academics/assessments')}}'><span><i class="fa fa-arrow-right"></i>Assessments</span></a></li>
                                <li><a href='{{url('academics/myclasses')}}'><i class="fa fa-arrow-right"></i><span>My Classes and Subjects</span></a></li>
                                <li><a href='{{url('academics/results')}}'><span><i class="fa fa-arrow-right"></i>Examination Results</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,9) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-newspaper-o"></i> Assets</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('academic/asset-types')}}'><span><i class="fa fa-arrow-right"></i>Asset Types</span></a></li>
                                <li><a href='{{url('academic/asset-reports')}}'><span><i class="fa fa-arrow-right"></i>Asset Reports</span></a></li>
                                <li><a href='{{url('academic/subject-allocation')}}'><span><i class="fa fa-arrow-right"></i>Asset Allocation</span></a></li>
                            </ul>
                        </li>
                    @endif

                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,10) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-newspaper-o"></i> Examination</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('examination/admission')}}'><span><i class="fa fa-arrow-right"></i>View Results</span></a></li>
                                <li><a href='{{url('examination/approve-results')}}'><span><i class="fa fa-arrow-right"></i>Approve results</span></a></li>
                                <li><a href='{{url('examination/publish-results')}}'><i class="fa fa-arrow-right"></i><span>Publish results</span></a></li>
                                <li><a href='{{url('examination/search')}}'><span><i class="fa fa-arrow-right"></i>Examination results search</span></a></li>
                                <li><a href='{{url('examination/reports')}}'><span><i class="fa fa-arrow-right"></i>Examination results reports</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,11) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-calendar"></i> Calendar </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('calendar')}}'><span><i class="fa fa-arrow-right"></i>Calendar</span></a></li>
                                <li><a href='{{url('calendar/my-calendar')}}'><i class="fa fa-arrow-right"></i><span>My Calendar</span></a></li>
                                <li><a href='{{url('calendar/my-events')}}'><i class="fa fa-arrow-right"></i><span>My Events</span></a></li>
                                <li><a href='{{url('calendar/events')}}'><span><i class="fa fa-arrow-right"></i>School Events</span></a></li>

                            </ul>
                        </li>
                    @endif

                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,12) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-money"></i> Accountant </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('accountant/finances')}}'><span><i class="fa fa-arrow-right"></i>Finances</span></a></li>
                                <li><a href='{{url('accountant/fee-payments')}}'><span><i class="fa fa-arrow-right"></i>Fee Payments</span></a></li>
                                <li><a href='{{url('accountant/search-payments')}}'><i class="fa fa-arrow-right"></i><span>Search Payments</span></a></li>
                                <li><a href='{{url('accountant/budget')}}'><i class="fa fa-arrow-right"></i><span>Budget</span></a></li>
                                <li><a href='{{url('accountant/budget-setup')}}'><span><i class="fa fa-arrow-right"></i>Budget Setup</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,13) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-cogs"></i> Classes </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('classes/admission')}}'><span><i class="fa fa-arrow-right"></i>Add new class</span></a></li>
                                <li><a href='{{url('classes')}}'><span><i class="fa fa-arrow-right"></i>List classes</span></a></li>
                                <li><a href='{{url('student/class-allocation')}}'><span><i class="fa fa-arrow-right"></i>Class Allocation</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,14) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-cogs"></i> My Profile </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('profile/admission')}}'><span><i class="fa fa-arrow-right"></i>Profile</span></a></li>
                                <li><a href='{{url('profile/pass-change')}}'><span><i class="fa fa-arrow-right"></i>Change Password</span></a></li>
                                <li><a href='{{url('logout')}}'><span><i class="fa fa-arrow-right"></i>Sign Out</span></a></li>

                            </ul>
                        </li>
                    @endif
                    @if( \App\Http\Controllers\UserController::checkAccessRights(Auth::user()->id,15) )
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <span><i class="fa fa-money"></i> E-mail </span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('emails/compose')}}'><span><i class="fa fa-arrow-right"></i>Compose</span></a></li>
                                <li><a href='{{url('emails/inbox')}}'><span><i class="fa fa-arrow-right"></i>Inbox</span></a></li>
                                <li><a href='{{url('emails/sent')}}'><i class="fa fa-arrow-right"></i><span>Sent</span></a></li>
                                <li><a href='{{url('emails/outbox')}}'><i class="fa fa-arrow-right"></i><span>Outbox</span></a></li>
                                <li><a href='{{url('emails/trash')}}'><span><i class="fa fa-arrow-right"></i>Trash</span></a></li>

                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix"></div><br><br><br>
        </div>
    </div>
    @stop
@section('pageScript')
    {!!HTML::script("assets/libs/d3/d3.v3.js")!!}
    {!!HTML::script("assets/libs/rickshaw/rickshaw.min.js")!!}
    {!!HTML::script("assets/libs/raphael/raphael-min.js")!!}
    {!!HTML::script("assets/libs/morrischart/morris.min.js")!!}
    {!!HTML::script("assets/libs/jquery-knob/jquery.knob.js")!!}
    {!!HTML::script("assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js")!!}
    {!!HTML::script("assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js")!!}
    {!!HTML::script("assets/libs/jquery-clock/clock.js")!!}
    {!!HTML::script("assets/libs/jquery-easypiechart/jquery.easypiechart.min.js")!!}
    {!!HTML::script("assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js")!!}
    {!!HTML::script("assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js")!!}
    {!!HTML::script("assets/libs/bootstrap-calendar/js/bic_calendar.min.js")!!}
    {!!HTML::script("assets/js/apps/calculator.js")!!}
    {!!HTML::script("assets/js/apps/todo.js")!!}
    {!!HTML::script("assets/js/apps/notes.js")!!}
    {!!HTML::script("assets/js/pages/index.js")!!}
    @stop
@section('contents')
    <!-- Start info box -->
    <div class="row top-summary">
        <div class="col-lg-3 col-md-6">
            <div class="widget green-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-globe-inv"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>SCHOOLS</b></p>
                        <h2><span class="animate-number" data-value="25153" data-duration="3000">0</span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-caret-up rel-change"></i> <b>39%</b> increase in schools
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="widget darkblue-2 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="icon-bag"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>STAFFS</b></p>
                        <h2><span class="animate-number" data-value="6399" data-duration="3000">0</span></h2>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-caret-down rel-change"></i> <b>11%</b> increase in staff #
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="widget pink-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>STUDENTS</b></p>
                        <h2><span class="animate-number" data-value="70389" data-duration="3000">0</span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-caret-down rel-change"></i> <b>7%</b> increase in student#
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="widget lightblue-1 animated fadeInDown">
                <div class="widget-content padding">
                    <div class="widget-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="text-box">
                        <p class="maindata">TOTAL <b>PROGRAM/COUSES</b></p>
                        <h2><span class="animate-number" data-value="18648" data-duration="3000">0</span></h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-caret-up rel-change"></i> <b>6%</b> increase in programs #
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of info box -->

    <div class="row">

        <div class="col-lg-4 portlets pull-right">
            <div class="row">
                <div class="col-sm-12">
                    <div id="todo-app" class="widget">
                        <div class="widget-header centered">
                            <div class="left-btn"><a class="btn btn-sm btn-default add-todo"><i class="fa fa-plus"></i></a></div>
                            <h2>Todo List</h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                <a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div class="widget-content padding-sm">
                            <ul class="todo-list">
                                <li>
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">Generate monthly sales report for John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
												<span class="todo-tags pull-right">
													<div class="label label-success">New</div>
												</span>
                                </li>
                                <li class="high">
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">Mail those reports to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
                                </li>
                                <li>
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">Don't forget to send those reports to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
                                </li>
                                <li class="medium">
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">If you forgot, go back to office to pick them up</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
												<span class="todo-tags pull-right">
													<div class="label label-info">Today</div>
												</span>
                                </li>
                                <li class="low">
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">Deliver reports by hand to John</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
                                </li>
                                <li>
                                    <span class="check-icon"><input type="checkbox" /></span>
                                    <span class="todo-item">Say John that you are sorry</span>
												<span class="todo-options pull-right">
													<a href="javascript:;" class="todo-delete"><i class="icon-cancel-3"></i></a>
												</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-4 portlets pull-right">
            <div class="row">
                <div class="col-sm-12">
                    <div id="notes-app" class="widget">
                        <div class="notes-line"></div>
                        <div class="widget-header centered transparent">
                            <div class="left-btn btn-group"><a class="btn btn-sm btn-primary add-note"><i class="fa fa-plus"></i></a><a class="btn btn-sm btn-primary back-note-list"><i class="icon-align-justify"></i></a></div>
                            <h2>Notes</h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                                <a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div class="widget-content padding-sm">
                            <div id="notes-list">
                                <div class="scroller">
                                    <ul class="list-unstyled">
                                    </ul>
                                </div>
                            </div>
                            <div id="note-data">
                                <form>
                                    <textarea class="form-control" id="note-text" placeholder="Your note..."></textarea>
                                </form>
                            </div>
                            <div class="status-indicator">Saved</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
