<?php
    $school_id="";
    $user_id="";
$first_name="";
$surname="";
$other_name="";
$email="";
$phone="";
$username="";
   if(count($user) >0)
    {
        $user_id=$user->id;
        $first_name=$user->first_name;
        $surname=$user->surname;
        $other_name=$user->other_name;
        $email=$user->email;
        $phone=$user->phone;
        $username=$user->username;
        $school_id=$user->school_id;
    }

?>
    {!! Form::open(array('url' => 'school/user/edit','id'=>'schoolUserRegistration','class'=>'form-horizontal', 'role'=>'form')) !!}
    <div class="form-group">
        <label for="input-text" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$first_name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="input-text-help" class="col-sm-2 control-label">Surname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname" value="{{$surname}}">

        </div>
    </div>
    <div class="form-group">
        <label for="input-text-help" class="col-sm-2 control-label">Other Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="other_name" name="other_name" placeholder="Enter Other Name" value="{{$other_name}}">

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{$email}}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phone"  name="phone" placeholder="Phone Number" value="{{$phone}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$username}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
            <input type="submit" name="btnsubmit" class="btnsubmit btn btn-success btn-block" value="Update">
            <input type="hidden" name="school_id" value="{{$school_id}}">
            <input type="hidden" name="user_id" value="{{$user_id}}">
        </div>
        <div id="output" class="col-md-8"></div>
    </div>
    {!!Form::close() !!}
{!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
{!!HTML::script("assets/js/pages/form-validation.js")!!}