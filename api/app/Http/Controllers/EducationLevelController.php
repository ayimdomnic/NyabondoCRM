<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EducationLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\School;

class EducationLevelController extends Controller
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
            $elevels=EducationLevel::all();
            return view('ELevels.index',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();
            return view('ELevels.index',compact('elevels'));
        }
    }
    public function manage()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $elevels = EducationLevel::all();
            return view('ELevels.manage', compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels = EducationLevel::where('school_id','=',$school_id)->get();
            return view('ELevels.manage', compact('elevels'));
        }
    }
    public function listLevels()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $elevels = EducationLevel::all();
            return view('ELevels.list', compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels = EducationLevel::where('school_id','=',$school_id)->get();
            return view('ELevels.list', compact('elevels'));
        }
    }
    public function listLevelsm()
    {
        //
        if(Auth::user()->role =="Superuser") {
            $elevels = EducationLevel::all();
            return view('ELevels.listm', compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels = EducationLevel::where('school_id','=',$school_id)->get();
            return view('ELevels.listm', compact('elevels'));
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
        $school_id=Auth::user()->school_id;
        return view('ELevels.create',compact('school_id'));
    }

    public function createm()
    {
        //
        $school_id=Auth::user()->school_id;
        return view('ELevels.createm',compact('school_id'));
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
            'level_name' => 'required',
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
            $getYear =AcademicSetupController::getCYear($request->school_id);
            $cl=new EducationLevel;
            $cl->school_id=$request->school_id;
            $cl->level_name=$request->level_name;
            $cl->level_descriptions=$request->level_descriptions;
            $cl->input_by=Auth::user()->id;
            $cl->current_year=$getYear;
            $cl->remarks=$request->remarks;
            $cl->status=$request->status;
            $cl->save();

        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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

    //Create classes
    public function createClasses($id)
    {
        //
        $el =EducationLevel::find($id);
        return view('ELevels.classesCreate',compact('el'));
    }

    //Get list of classes from the level
    public function getElevelClasses($id)
    {
        $el =EducationLevel::find($id);
        return view('ELevels.listClasses',compact('el'));
    }
    public function getElevelClassesmn($id)
    {
        $el =EducationLevel::find($id);
        return view('ELevels.listClassesmn',compact('el'));
    }

    public static function getElevelById($id)
    {
        $el =EducationLevel::find($id);
        if(count($el)>0) {
            return $el;
        } else { return "";}
    }
}
