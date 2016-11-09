<?php
$school_id="";

if(old('school_id') !="")
        {
            $school_id=old('school_id');
        }elseif(count($user) >0)
        {
            $school_id=$id;
        }else
        {
            $school_id=$id;
        }

?>

    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2>Register New user</h2>
                </div>
                <div class="widget-content padding">
                    <br>
                    <div class="row" id="userEditor">
                         {!! Form::open(array('url' => 'school/user/add','id'=>'schoolUserRegistration','class'=>'form-horizontal', 'role'=>'form')) !!}
                        <div class="form-group">
                            <label for="input-text" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-text-help" class="col-sm-2 control-label">Surname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname">

                            </div>
                        </div>
                            <div class="form-group">
                                <label for="input-text-help" class="col-sm-2 control-label">Other Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="other_name" name="other_name" placeholder="Enter Other Name">

                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">E-Mail</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Enter Email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone"  name="phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
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
                                 <input type="submit" name="btnsubmit" class="btnsubmit btn btn-success btn-block" value="Submit">
                                 <input type="hidden" name="school_id" value="{{$school_id}}">
                            </div>
                            <div id="output" class="col-md-8"></div>
                        </div>
                        {!!Form::close() !!}
                    </div>
                    <div class="row" id="display">
                        <p>Registered users for this school</p>
                        <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SNO</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Other Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </thead>

                            <tfoot>
                            <tr>
                            <tr>
                                <th>SNO</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Other Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tfoot>

                            <tbody>
                            <?php $c=1;
                                foreach($user as $sc)
                                {
                                    echo '<tr>
                                                <td>'.$c.'</td>
                                                <td>'.$sc->first_name.'</td>
                                                <td>'.$sc->surname.'</td>
                                                <td>'.$sc->other_name.'</td>
                                                <td>'.$sc->email.'</td>
                                                <td>'.$sc->phone.'</td>
                                                <td id="'.$sc->id.'" style="align-content: center" >
                                                    <div class="col-md-6" id="'.$sc->id.'">
                                                        <a href="#" title="Edit" class="btn edituser" id="edituser"><i class="fa fa-pencil-square-o text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="col-md-6" id="'.$sc->id.'">
                                                        <a href="#b" title="Delete" class="deleteapp "><i class="fa fa-trash-o text-danger"></i> delete </a>
                                                    </div>
                                                </td>
                                            </tr>';
                                    $c++;
                                }
                                echo ' </tbody>
                                            </table>';
        ?>
                        </table>
                    </div>
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px">
                        <div class="col-md-2 pull-right">
                            <a href="#" data-dismiss="modal" class="btn btn-success btn-block"> <i class="fa-o"></i>Close</a>
                        </div>
                    </div>
                </div>
                {!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
                {!!HTML::script("assets/js/pages/form-validation.js")!!}
            </div>
        </div>
    </div>


<script>
    //Delete Application
    $(".deleteapp").click(function(){
        var id1 = $(this).parent().attr('id');
        $(".deleteuser").show("slow").parent().parent().find("span").remove();
        var btn = $(this).parent().parent();
        $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
        $("#no").click(function(){
            $(this).parent().parent().find(".deleteapp").show("slow");
            $(this).parent().parent().find("span").remove();
        });
        $("#yes").click(function(){
            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
            $.get("<?php echo url('schools/delete/') ?>/"+id1,function(data){
                btn.hide("slow").next("hr").hide("slow");
            });
        });
    });

    $("#edituser").click(function(){
        var id1 = $(this).parent().attr('id');
        $.get("<?php echo url('school/user/edit') ?>/"+id1,function(data){
            $("#userEditor").html(data);
            btn.hide("slow").next("hr").hide("slow");
        });
    });

</script>