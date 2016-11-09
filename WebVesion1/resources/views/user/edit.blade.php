
<div class="container">
<div class="row" id="userEditor">
    <div class="col-sm-12">
    {!! Form::open(array('url' => 'users/edit','id'=>'UserRegistration','class'=>'form-horizontal', 'role'=>'form')) !!}
    <div class="form-group">
        <label for="input-text" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$user->first_name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="input-text-help" class="col-sm-2 control-label">Surname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname" value="{{$user->first_name}}">

        </div>
    </div>
    <div class="form-group">
        <label for="input-text-help" class="col-sm-2 control-label">Other Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="other_name" name="other_name" placeholder="Enter Other Name" value="{{$user->first_name}}">

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{$user->email}}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phone"  name="phone" placeholder="Phone Number" value="{{$user->phone}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$user->username}}" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label for="school" class="col-sm-2 control-label">School</label>
        <div class="col-sm-10">
            <?php
            $SchoolArr=\App\School::all(); ?>

            <select id="school" name="school" class="form-control">
                @if($user->school_id !="")
                <option value="{{$user->school_id}}" selected="selected"><?php echo \App\Http\Controllers\SchoolController::getSchoolNameById($user->school_id);?></option>
                @else
                    <option value="" selected="selected">----</option>
                    @endif
                @foreach($SchoolArr as $sc)
                    <option value="{{$sc->id}}">{{$sc->school_name}}</option>
                @endforeach
            </select>
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
        <div class="col-sm-2 pull-right">
           <a href="#" data-dismiss="modal" class="btn btn-danger btn-block"> Close </a>
        </div>
        <div class="col-sm-2 pull-right">
            <input type="submit" name="btnsubmit" class="btnsubmit btn btn-success btn-block" value="Update">
            <input type="hidden" name="school_id" value="{{$user->school_id}}">
            <input type="hidden" name="id" value="{{$user->id}}">
        </div>

        <div id="output" class="col-md-8"></div>
    </div>
    {!!Form::close() !!}
        {!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
        {!!HTML::script("assets/js/pages/form-validation.js")!!}
</div>
</div>
</div>