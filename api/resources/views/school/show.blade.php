@extends('layout.master')
@section('page-title')
    School Information System|  School
    @stop
@section('contents')
    <!-- Page Heading Start -->
    <div class="page-heading">
        <h1>Add New School</h1>
    </div>
    <!-- Page Heading End-->
    {!! Form::open(array('url' => 'schools/add','id'=>'school_add')) !!}
    <div class="row">
        <div class="col-sm-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>School Information</strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>

                    </div>
                </div>
                <div class="widget-content padding">

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
                        <input type="text" class="form-control" name="start_date">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>School Ownership Details</strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                    </div>
                </div>
                <div class="widget-content padding">

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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 portlets">
            <div class="widget">
                <div class="widget-header transparent">
                    <h2><strong>School location </strong> Form</h2>
                    <div class="additional-btn">
                        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                    </div>
                </div>
                <div class="widget-content padding">

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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 portlets">
            <div class="widget">
                <div class="widget-content padding">
                    <div class="col-sm-2 pull-right" style="margin-top: 10px; margin-bottom: 10px;">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!!Form::close() !!}

@stop
