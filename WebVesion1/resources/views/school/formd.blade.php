@extends('layout.master')
@section('title')School Information System|Schools@stop
@section('pageScript')

    <!-- Wizard-->
    {!!HTML::script("assets/libs/jquery-wizard/jquery.easyWizard.js")!!}
    {!!HTML::script("assets/js/pages/form-wizard.js")!!}

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
                            <i class='icon-home-3'></i><span>Dashboard</span> <span class="pull-right"></span>
                        </a>
                    </li>
                    @if(Auth::user()->role =="Superuser")
                        <li class='has_sub'><a href='javascript:void(0);'>
                                <i class='icon-feather'></i>
                                <span>Manage Schools</span>
                            <span class="pull-right">
                                <i class="fa fa-angle-down"></i>
                            </span>
                            </a>
                            <ul>
                                <li><a href='{{url('schools/add')}} ' class='active'><span>New School</span></a></li>
                                <li><a href='{{url('schools')}}'><span>Available Schools</span></a></li>
                                <li><a href='{{url('schools-manage')}}'><span>Manage Schools</span></a></li>
                                <li><a href='{{url('schools-reports/')}}'><span>School general reports</span></a></li>

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
        <h1><i class='fa fa-magic'></i> School Information</h1></div>
    <!-- Page Heading End-->
    <div class="row">
        <div class="row">

            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <h2>Register New School</h2>
                        <div class="additional-btn">
                            <a class="btn btn-blue-1" style="color: #fff" href="{{url('schools/add')}}"><i class="fa fa-file-text-o"></i> New  </a>
                            <a class="btn btn-blue-3" style="color: #fff" href="{{url('schools')}}"><i class="fa fa-th-list"></i> View </a>
                            <a class="btn btn-red-1" style="color: #fff" href="{{url('schools-manage')}}"><i class="fa fa-cog"></i> Manage </a>
                            <a class="btn btn-green-3" style="color: #fff" href="{{url('schools-reports')}}"><i class="fa fa-bar-chart-o"></i>  Reports </a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <br>
            <div class="widget animated fadeInDown">
                {!! Form::open(array('url' => 'schools/add','id'=>'myWizard')) !!}

                <section class="step" data-step-title="Basic School Information">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>School Code</label>
                                <input type="text" class="form-control" name="school_code">
                            </div>
                            <div class="form-group">
                                <label>Name of the School</label>
                                <input type="text" class="form-control" name="school_name">
                            </div>
                            <div class="form-group">
                                <label>Is Shool registered</label>
                                <input type="text" class="form-control" name="registered">
                            </div>
                            <div class="form-group">
                                <label>Registration Number</label>
                                <input type="text" class="form-control" name="registration_no">
                            </div>
                            <div class="form-group">
                                <label>Accredited</label>
                                <input type="text" class="form-control" name="accredited">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker-input" data-mask="9999-99-99" placeholder="yyyy-mm-dd" name="start_date">
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                            <div class="form-group">
                                <label>School Profile</label>
                                <textarea class="form-control" name="SchoolProfile" style="height: 140px; resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="notes">
                                <h4><strong>About School Information</strong></h4>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
                                <ol>
                                    <li>Duis autem vel eum iriure dolor in hendrerit in vulputate</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Sed diam nonummy nibh euismod tincidunt</li>
                                    <li>Sonsectetuer adipiscing elit</li>
                                    <li>Tincidunt ut laoreet dolore magna aliquam erat volutpat</li>
                                </ol>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="step" data-step-title="Ownership Details">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Ownership Type</label>
                                <select name="ownership_type" class="form-control">
                                    <option value="">--Select Ownership Detail--</option>
                                    <option>Government</option>
                                    <option>Private</option>
                                    <option>FBO</option>
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
                        </div>
                        <div class="col-sm-4">
                            <div class="notes">
                                <h4><strong>Ownership Details</strong> note</h4>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
                                <ol>
                                    <li>Duis autem vel eum iriure dolor in hendrerit in vulputate</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Sed diam nonummy nibh euismod tincidunt</li>
                                    <li>Sonsectetuer adipiscing elit</li>
                                    <li>Tincidunt ut laoreet dolore magna aliquam erat volutpat</li>
                                </ol>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="step" data-step-title="School location/Address">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Postal Address</label>
                                <textarea class="form-control" name="postal_address"> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Physical Address</label>
                                <textarea class="form-control" name="physical_address"> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Phisical Address</label>
                                <textarea class="form-control" name="phisical_address"> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Region</label>
                                <select name="region" class="form-control">
                                    <option value="">--Select Ownership Detail--</option>
                                    <option>Government</option>
                                    <option>Private</option>
                                    <option>FBO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>District</label>
                                <select name="district" class="form-control">
                                    <option value="">--Select Ownership Detail--</option>
                                    <option>Government</option>
                                    <option>Private</option>
                                    <option>FBO</option>
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
                        <div class="col-sm-4">
                            <div class="notes">
                                <h4><strong>Address</strong> note</h4>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
                                <ol>
                                    <li>Duis autem vel eum iriure dolor in hendrerit in vulputate</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Sed diam nonummy nibh euismod tincidunt</li>
                                    <li>Sonsectetuer adipiscing elit</li>
                                    <li>Tincidunt ut laoreet dolore magna aliquam erat volutpat</li>
                                </ol>
                                <p style="text-align: justify">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>
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
@stop

