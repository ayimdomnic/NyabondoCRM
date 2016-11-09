@extends('layout.master')
@section('page-title')
    School Information System| Register new School
    @stop
@section('pageScript')

    <!-- Wizard-->
    {!!HTML::script("assets/libs/jquery-wizard/jquery.easyWizard.js")!!}
    {!!HTML::script("assets/js/pages/form-wizard.js")!!}
    {!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
    {!!HTML::script("assets/js/pages/form-validation.js")!!}
    {!!HTML::script("assets/libs/bootstrap-select/bootstrap-select.min.js" )!!}
    {!!HTML::script("assets/libs/bootstrap-inputmask/inputmask.js" )!!}
    {!!HTML::script("assets/libs/summernote/summernote.js" )!!}
    {!!HTML::script("assets/js/pages/forms.js" )!!}
     <script>
         $("#region").change(function () {
             var id1 = this.value;
             $.get("<?php echo url('getDistricts') ?>/"+id1,function(data){
                 $("#district").html(data);
             });
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
                                <li><a href='{{url('schools/add')}}'  class='active'><span><i class="fa fa-arrow-right"></i>School Registration</span></a></li>
                                <li><a href='{{url('schools')}}'><span><i class="fa fa-arrow-right"></i>List Schools</span></a></li>
                                <li><a href='{{url('schools-manage')}}' ><span><i class="fa fa-arrow-right"></i>Manage Schools</span></a></li>
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
 @section('contents')
     {!!HTML::script("assets/js/tinymce/tinymce.min.js")!!}
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists   charmap   anchor",
                "insertdatetime  contextmenu paste"
            ],
            toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
        });
    </script>
    <!-- Page Heading Start -->
    <div class="page-heading">
        <h1><i class='fa fa-building'></i> School Information</h1></div>
    <!-- Page Heading End-->
    <div class="row">
        <div class="row">

            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <h2>School Registration</h2>
                        <div class="additional-btn">
                            <a class="btn btn-blue-1" style="color: #fff" href="{{url('schools/add')}}"><i class="fa fa-file-text-o"></i> New </a>
                            <a class="btn btn-blue-3" style="color: #fff" href="{{url('schools')}}"><i class="fa fa-th-list"></i> View </a>
                            <a class="btn btn-red-1" style="color: #fff" href="{{url('schools-manage')}}"><i class="fa fa-cog"></i> Manage </a>
                            <a class="btn btn-green-3" style="color: #fff" href="{{url('schools-reports')}}"><i class="fa fa-bar-chart-o"></i> Reports </a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <br>
                        <div class="widget animated fadeInDown">
                            {!! Form::open(array('url' => 'schools/add','id'=>'myWizard')) !!}

                            <section class="step" data-step-title="Basic School Information">
                               <div class="row" style=" margin-bottom: 10px; padding-bottom: 5px">
                                   <div class="col-sm-12">
                                       <span class="h2 text-info" style="border-bottom: 2px solid #7A868F;"> School Registration: Basic School Information</span>
                                   </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>School Code</label>
                                            <input type="text" class="form-control" name="school_code">
                                        </div>
                                        <div class="form-group">
                                            <label>Name of the School</label>
                                            <input type="text" class="form-control" name="school_name">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-sm-4">
                                                   <label>Is School registered</label>

                                                    <select class="form-control" name="registered" onchange="showRegistration(this);">
                                                        <option value="">-----</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                                <div class="col-sm-8" id="registrationField" >

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Accredited</label>
                                            <input type="text" class="form-control" name="accredited">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                <label>Start Date</label>
                                                <input type="text" class="form-control" data-mask="9999" placeholder="YYYY ie 2015" name="start_date">
                                            </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </section>
                            <section class="step" data-step-title="Ownership Details">
                                <div class="row" style=" margin-bottom: 10px; padding-bottom: 5px">
                                    <div class="col-sm-12">
                                        <span class="h2 text-info" style="border-bottom: 2px solid #7A868F;"> School Registration: Ownership Details</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Ownership Type</label>
                                            <select name="ownership_type" class="form-control">
                                                <option value="">----</option>
                                                <option>Government</option>
                                                <option>Private</option>
                                                <option>FBO</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Owner Name</label>
                                            <input type="text" class="form-control" name="owner">
                                        </div>
                                        <div class="form-group">
                                            <label>Head/Principal of school</label>
                                            <input type="text" class="form-control" name="school_head">
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" name="website">
                                        </div>
                                        <div class="form-group">
                                            <label>School Profile</label>
                                            <textarea class="form-control" name="SchoolProfile"  rows="20" style="height: 140px; resize: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="step" data-step-title="School location/Address">
                                <div class="row" style=" margin-bottom: 10px; padding-bottom: 5px">
                                    <div class="col-sm-12">
                                        <span class="h2 text-info" style="border-bottom: 2px solid #7A868F;"> School Registration: Address</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Postal Address</label>
                                            <textarea class="form-control" name="postal_address"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Physical Address</label>
                                            <textarea class="form-control" name="physical_address"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="region">Region</label>
                                            <?php
                                            $reg=array(''=>'--Select Region--');
                                            $reg=\App\Region::all(); ?>

                                            <select id="region" name="region" class="form-control">
                                                <option value="" selected="selected">----</option>
                                                 @foreach($reg as $rg)
                                                     <option value="{{$rg->id}}">{{$rg->region_name}}</option>
                                                     @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <label>District</label>
                                            <select name="district" id="district" class="form-control">
                                                <option value="">----</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" name="telephone">
                                        </div>
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input type="text" class="form-control" name="fax">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>


                                </div>
                            </section>
                            {!!Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showRegistration(choice)
        {
            if(choice.value =="Yes")
            {
                document.getElementById("registrationField").innerHTML ="<label>Registration Number</label> <input type='text' class='form-control' name='registration_no'>";
            }else
            {
                document.getElementById("registrationField").innerHTML ="<input type='hidden' class='form-control' value='' name='registration_no'>";
            }
        }
    </script>
@stop

