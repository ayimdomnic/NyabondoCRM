@extends('layout.master')
@section('page-title')
    School Information System| Accademic Setup
@stop
@section('pageScript')

    {!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
    {!!HTML::script("assets/js/pages/form-validation.js")!!}

@stop
@section('modals')
    <script>
        //Delete Application
        $(".deleteExam").click(function(){
            var id1 = $(this).parent().attr('id');
            $(".deleteExam").show("slow").parent().find("span").remove();
            var btn = $(this).parent().parent();
            $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
            $("#no").click(function(){
                $(this).parent().find(".deleteExam").show("slow");
                $(this).parent().find("span").remove();
            });
            $("#yes").click(function(){
                $(this).parent().html("<br><i class='icon-spinner icon-spin'></i>deleting...");
                $.get("<?php echo url('academic/classes/remove') ?>/"+id1,function(data){
                    btn.hide("slow").next("hr").hide("slow");
                });
            });
        });
        //adding school user
        $(".addExam").click(function(){

            var id1 = $(this).parent().attr('id');
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog" style="width:60%;margin-right: 20% ;margin-left: 20%">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<span id="myModalLabel" class="h2 modal-title text-center text-info" style="text-align: center">Examination Setup</span>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("academic/exams/create") ?>");
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });
        //Edit class streams
        $(".editExam").click(function(){
            var id1 = $(this).parent().attr('id');
            var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            modal+= '<div class="modal-dialog" style="width:80%;margin-right: 10% ;margin-left: 10%">';
            modal+= '<div class="modal-content">';
            modal+= '<div class="modal-header">';
            modal+= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            modal+= '<span id="myModalLabel" class="h2 modal-title text-center text-info" style="text-align: center">Update School Class Level</span>';
            modal+= '</div>';
            modal+= '<div class="modal-body">';
            modal+= ' </div>';
            modal+= '</div>';
            modal+= '</div>';
            $('body').css('overflow','hidden');

            $("body").append(modal);
            $("#myModal").modal("show");
            $(".modal-body").html("<h3><i class='fa fa-spin fa-spinner '></i><span>loading...</span><h3>");
            $(".modal-body").load("<?php echo url("academic/exams/edit") ?>/"+id1);
            $("#myModal").on('hidden.bs.modal',function(){
                $("#myModal").remove();
            })

        });

        $("#eduLevel").change(function () {
            var id1 = this.value;
            if(id1 != "")
            {
                $.get("<?php echo url('getLevelExamsm') ?>/"+id1,function(data){
                    $("#exams").html(data);
                });

            }else{$("#exams").html("");}
        });

    </script>

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
                        <a href='{{url('home')}}' >
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
                                <li><a href='{{url('academic/edu-levels')}}' ><span><i class="fa fa-arrow-right"></i>Education Levels</span></a></li>
                                <li><a href='{{url('academic/classes')}}' ><span><i class="fa fa-arrow-right"></i>Classes and Streams</span></a></li>
                                <li><a href='{{url('academic/grade')}}' ><span><i class="fa fa-arrow-right"></i>Grade setup</span></a></li>
                                <li><a href='{{url('academic/examination-types')}}' class='active'><i class="fa fa-arrow-right"></i><span>Examination types</span></a></li>
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
    @section('contents')
            <!-- Page Heading Start -->
    <div class="page-heading">
        <h1><i class='fa fa-table'></i> EXAMINATION SETTINGS</h1>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2>List of registered exams</h2>
                    <div class="additional-btn">
                        <a class="addExam btn btn-blue-1" style="color: #fff" href="#"><i class="fa fa-file-text-o"></i> New Examination </a>
                        <a class="btn btn-blue-3" style="color: #fff" href="{{url('academic/exams')}}"><i class="fa fa-th-list"></i> View Examination </a>
                        <a class="btn btn-red-1" style="color: #fff" href="{{url('academic/exams/manage')}}"><i class="fa fa-cog"></i> Manage Examination </a>
                        <a class="btn btn-green-3" style="color: #fff" href="{{url('academic/exams/reports')}}"><i class="fa fa-bar-chart-o"></i> Examination Reports </a>
                    </div>
                </div>
                <div class="widget-content">
                    <br>
                    <div class="row">
                        <div class="col-sm-3 " style="margin-left: 20px;">
                            <h3 class="text-info text-blue-3">Select Education Level</h3>
                        </div>
                        <div class="col-sm-4">

                            <select name="eduLevel" class="form-control" id="eduLevel">
                                <option value="">----</option>
                                @foreach($elevels as $el)
                                    <option value="{{$el->id}}">{{$el->level_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive" id="exams">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop