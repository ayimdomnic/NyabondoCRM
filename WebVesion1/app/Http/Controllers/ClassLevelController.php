<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClassLevel;
use App\ClassStream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\School;
use App\EducationLevel;

class ClassLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $elevels = EducationLevel::all();
            return view('CLevels.index', compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels = EducationLevel::where('school_id','=',$school_id)->get();
            return view('CLevels.index', compact('elevels'));
        }

    }
    public function listClasses()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $classes = ClassLevel::all();
            return view('CLevels.list', compact('classes'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $classes = ClassLevel::where('school_id','=',$school_id)->get();
            return view('CLevels.list', compact('classes'));
        }
    }
    public function listClassesm()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $classes = ClassLevel::all();
            return view('CLevels.listm', compact('classes'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $classes = ClassLevel::where('school_id','=',$school_id)->get();
            return view('CLevels.listm', compact('classes'));
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

        if(Auth::user()->role =="Superuser")
        {
            $schools=School::all();
            return view('CLevels.admcreate',compact('schools'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();
            return view('CLevels.create',compact('elevels'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {

            $errors=$validator->errors();

            if (count($errors) > 0){
                echo ' <div class="alert alert-danger">' ;
                echo '<ul>' ;
                foreach ($errors->all() as $error)
                {
                    echo ' <li>$error</li>';
                }

                echo '</ul>';
                echo '</div>';
            }
        }
        else
        {
            $school_id=Auth::user()->school_id;
           // $getYear =AcademicSetupController::getCYear($school_id);

            $cl=new ClassLevel;
            $cl->school_id=$school_id;
            $cl->level_id=$request->level_id;
            $cl->class_name=$request->class_name;
            $cl->class_descriptions=$request->class_descriptions;
            $cl->input_by=Auth::user()->id;
            $cl->remarks=$request->remarks;
            $cl->status=$request->status;
            $cl->save();
        }

     return "<h3><span class='text-info'>Data Successful saved</span><h3>";

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
        $class=ClassLevel::find($id);
        return view('CLevels.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        //
        //
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {

            $errors=$validator->errors();

            if (count($errors) > 0){
                echo ' <div class="alert alert-danger">' ;
                echo '<ul>' ;
                foreach ($errors->all() as $error)
                {
                    echo ' <li>$error</li>';
                }

                echo '</ul>';
                echo '</div>';
            }
        }
        else
        {
            $school_id=Auth::user()->school_id;
            //$getYear =AcademicSetupController::getCYear($school_id); Get year
            $id=$request->id;
            $cl= ClassLevel::find($id);
            $cl->school_id=$school_id;
            $cl->level_id=$request->level_id;
            $cl->class_name=$request->class_name;
            $cl->class_descriptions=$request->class_descriptions;
            $cl->input_by=Auth::user()->id;
            $cl->remarks=$request->remarks;
            $cl->status=$request->status;
            $cl->save();
        }

        return "<h3><span class='text-info'>Data Successful saved</span><h3>";
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
    }

    public function manage()
    {
        if(Auth::user()->role =="Superuser") {
            $elevels = EducationLevel::all();
            return view('CLevels.manage', compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels = EducationLevel::where('school_id','=',$school_id)->get();
            return view('CLevels.manage', compact('elevels'));
        }
    }
}
