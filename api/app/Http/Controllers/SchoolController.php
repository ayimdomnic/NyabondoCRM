<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Validator;
use App\School;
use App\User;
use App\Http\Requests\UserRequest;
use App\Audit;
use Illuminate\Support\Facades\Auth;
use App\UserRight;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $school=School::all();
        return view('school.index',compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('school.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SchoolRequest $request)
    {
        //
        $sc=new School;
        $sc->school_code=$request->school_code;
        $sc->school_name=$request->school_name;
        $sc->registered=$request->registered;
        $sc->registration_no=$request->registration_no;
        $sc->accredited=$request->accredited;
        $sc->SchoolProfile=$request->SchoolProfile;
        $sc->ownership_type=$request->ownership_type;
        $sc->owner=$request->owner;
        $sc->region=$request->region;
        $sc->district=$request->district;
        $sc->postal_address=$request->postal_address;
        $sc->physical_address=$request->physical_address;
        $sc->school_head=$request->school_head;
        $sc->mobile=$request->mobile;
        $sc->telephone=$request->telephone;
        $sc->fax=$request->fax;
        $sc->email=$request->email;
        $sc->website=$request->website;
        $sc->start_date=$request->start_date;
        $sc->status=$request->status;
        $sc->created_date=date('Y-m-d');
        $sc->save();


        //Process Audit trail
        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Register new School named ".$request->school_name ." with school ID ". $sc->id;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();
        return redirect('schools');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $school=School::find($id);
        return view('school.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $school=School::find($id)->first();
        return view('school.edit',compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(SchoolRequest $request)
    {
        //
        $sc= School::find($request->id);
        $sc->school_code=$request->school_code;
        $sc->school_name=$request->school_name;
        $sc->registered=$request->registered;
        $sc->registration_no=$request->registration_no;
        $sc->accredited=$request->accredited;
        $sc->SchoolProfile=$request->SchoolProfile;
        $sc->ownership_type=$request->ownership_type;
        $sc->owner=$request->owner;
        $sc->region=$request->region;
        $sc->district=$request->district;
        $sc->postal_address=$request->postal_address;
        $sc->physical_address=$request->physical_address;
        $sc->school_head=$request->school_head;
        $sc->mobile=$request->mobile;
        $sc->telephone=$request->telephone;
        $sc->fax=$request->fax;
        $sc->email=$request->email;
        $sc->website=$request->website;
        $sc->start_date=$request->start_date;
        $sc->status=$request->status;
        $sc->created_date=date('Y-m-d');
        $sc->save();

        //Process Audit trail
        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Update School named ".$request->school_name ." with school ID ". $sc->id;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();
        return redirect('schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $school=School::find($id);
        foreach( $school->users as $us)
        {
            $us->delete();
        }


        //Process Aud train
        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Delete School named ".$school->school_name ." with school ID ". $school->id;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();

        $school->delete(); //Finish deleteing school
    }
    public function schoolReports()
    {
        //
        return view('school.reports');

    }
    public function manage()
    {
        //
        $school=School::all();
        return view('school.manage',compact('school'));
    }
    public  function schoolSearch()
    {

    }

    public  function addUser($id)
    {
        $user=User::where('school_id','=',$id)->where('role','=','Administrator')->get();
        return view('school.addUser',compact('user','id'));
    }
    public  function saveUser(UserRequest $request)
    {

        $user=new User;
        $user->first_name =$request->first_name;
        $user->other_name =$request->other_name;
        $user->surname =$request->surname;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->username =$request->username;
        $user->password =bcrypt($request->password);
        $user->school_id =$request->school_id;
        $user->role ='Administrator';
        $user->status ='active';
        $user->save();

        for($i=1; $i<= 16; $i++)
        {
            $user_right=new UserRight;
            $user_right->user_id=$user->id;
            $user_right->module=$i;
            $user_right->can_access='Y';
            $user_right->can_edit='Y';
            $user_right->save();
        }
        //Process Audit trail
        $school=School::find($request->school_id);

        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Added new user for school  ".$school->school_name ." with school ID ". $school->id. " User with user name ".$request->username ."and User ID ".$user->id ;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();


        $user=User::where('school_id','=',$request->school_id)->where('role','=','Administrator')->get();
       echo '   <p>Registered users for this school</p>';
       echo ' <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                            ';

                             $c=1;
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
                        <a href="#" title="Edit" class="edituser" id="btn edituser"><i class="fa fa-pencil-square-o text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
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
    }

    //Show user editor
    public function showUserEdit($id)
    {
        $user =User::find($id);
        return view('school.editUser',compact('user'));

    }

    //Update user

    public function updateUser(UserRequest $request)
    {
        $user= User::find($request->user_id);
        $user->first_name =$request->first_name;
        $user->other_name =$request->other_name;
        $user->surname =$request->surname;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->username =$request->username;
        $user->password =bcrypt($request->password);
        $user->school_id =$request->school_id;
        $user->role ='Administrator';
        $user->status ='active';
        $user->save();

        //Process Aud train
        $school=School::find($request->school_id);

        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Update  user for school  ".$school->school_name ." with school ID ". $school->id. " User with user name ".$request->username ."and User ID ".$user->id ;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();


        $user=User::where('school_id','=',$request->school_id)->where('role','=','Administrator')->get();
        echo '   <p>Registered users for this school</p>';
        echo ' <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                            ';

        $c=1;
        foreach($user as $sc)
        {
            echo '<tr>
                <td>'.$c.'</td>
                <td>'.$sc->first_name.'</td>
                <td>'.$sc->surname.'</td>
                <td>'.$sc->other_name.'</td>
                <td>'.$sc->email.'</td>
                <td>'.$sc->phone.'</td>
                <td id="$sc->id" style="align-content: center" >
                    <div class="col-md-6" id="$sc->id">
                        <a href="#" title="Edit" class="editapp "><i class="fa fa-pencil-square-o text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
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
    }
  //Get school name
    public static function getSchoolNameById($school_id)
    {
        $sc=School::find($school_id);
        if(count($sc)>0) {
            return $sc-> school_name;} else {return "";}
    }
}
