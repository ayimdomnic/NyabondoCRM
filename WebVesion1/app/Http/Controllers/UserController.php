<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\UserRight;
use App\User;
use App\Audit;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //


        if(Auth::user()->role =="Superuser")
        {
            $users=User::all();
            return view('user.index',compact('users'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $users=User::where('school_id','=',$school_id)->get();
            return view('user.index',compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        //
        $user=new User;
        $user->first_name =$request->first_name;
        $user->other_name =$request->other_name;
        $user->surname =$request->surname;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->username =$request->username;
        $user->password =bcrypt($request->password);
        $user->school_id =$request->school;
        $user->role ='Administrator';
        $user->status ='active';
        $user->save();

        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Added new user for the system with school ID ". $request->school. " User with user name ".$request->username ." and User ID ".$user->id ;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();
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
        $user=User::find($id);
        if(count($user) >0)
        {
            return view('user.edit',compact('user'));
        }
        else{
            return view('user.add');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request)
    {
        //
        $user= User::find($request->id);
        $user->first_name =$request->first_name;
        $user->other_name =$request->other_name;
        $user->surname =$request->surname;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->username =$request->username;
        $user->password =bcrypt($request->password);
        $user->school_id =$request->school;
        $user->role ='Administrator';
        $user->status ='active';
        $user->save();

        $audit=new Audit;
        $audit->user_id =Auth::user()->id;
        $audit->activity="Update user for the system with school ID ". $request->school. " User with user name ".$request->username ." and User ID ".$user->id ;
        $audit->module="School Management";
        $audit->activity_when=date("Y-m-d H:i:s");
        $audit->save();
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
        $user=User::find($id);
        //Remove user rights
           foreach($user as $us)
           {
               $us->userRights()->delete();
           }
        $user->delete();

    }

     //User reports
    public function report()
    {

    }
    //Show login
    public function login()
    {
        if (Auth::check())
        {
            // The user is logged in...
            return redirect('home');
        }
        else
        {
            return view('user.login');
        }

    }
    //Process login
    public function processLogin(Request $request)
    {
        $username=$request->username;
        $password=$request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            if(Auth::user()->block ==1)
            {
                Auth::logout();
                return redirect()->back()->with('message', 'Login Failed you don\'t have Access to login please  Contact Administrator');
            }
            else
            {
                $user= User::find(Auth::user()->id);
                $user->last_login=date("Y-m-d h:i:s");
                $user->save();

                return redirect()->intended('home');
            }

        }
        else
        {
            return redirect()->back()->with('message', 'Login Failed,Invalid username or password');
        }
    }

    //function logout
    public function logout()
    {
        if (Auth::check())
        {
            $user= \App\User::find(Auth::user()->id);
            $user->last_logout=date("Y-m-d h:i:s");
            $user->save();
        }

        Auth::logout();
        return view('user.login');
    }
    //lockscreen
    public function lockscreen()
    {
        if (Auth::check())
        {
            $user= \App\User::find(Auth::user()->id);
            $user->last_logout=date("Y-m-d h:i:s");
            $user->save();
        }

        Auth::logout();
        return view('user.lockscreen');
    }
    //Unlock screen
    public function unlockscreen(UserRequest $request)
    {
        $username=$request->username;
        $password=$request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            if(Auth::user()->block ==1)
            {
                Auth::logout();
                return redirect()->back()->with('message', 'Login Failed you don\'t have Access to login please  Contact Administrator');
            }
            else
            {
                $user= \App\User::find(Auth::user()->id);
                $user->last_login=date("Y-m-d h:i:s");
                $user->save();

                return redirect()->intended('home');
            }

        }
        else
        {
            return redirect()->back()->with('message', 'Login Failed,Invalid username or password');
        }
    }
    //Show home page

    public function home()
    {
        if(Auth::user()->role =="Superuser")
        {
            return view('user.admin_dashboard');
        }
        else
        {
            return view('user.admin_dashboard');
        }

    }

    //Process access rights
    public static function checkAccessRights($user_id,$module)
    {
        $usr=UserRight::where('user_id','=',$user_id)->where('module','=',$module)->where('can_access','=','Y')->get();
        if(count($usr)>0) {
            return true;} else {return false;}
    }

    //Check Edit Rights
    public static function checkEditRights($user_id,$module)
    {
        $usr=UserRight::where('user_id','=',$user_id)->where('module','=',$module)->where('can_edit','=','Y')->get();
        if(count($usr)>0) {
            return true;} else {return false;}
    }
}
