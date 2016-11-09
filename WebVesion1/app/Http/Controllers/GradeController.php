<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EducationLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\School;
use App\Grade;

class GradeController extends Controller
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
            return view('grade.index',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();

            return view('grade.index',compact('elevels'));
        }
    }
    public function manage()
    {
        //

        if(Auth::user()->role =="Superuser")
        {
            $elevels=EducationLevel::all();
            return view('grade.manage',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();

            return view('grade.manage',compact('elevels'));
        }
    }



    /**
     * Get list of grades.
     *
     * @return Response
     */
    public function getGrades($id)
    {
        $elevels= EducationLevel::find($id);
        return view('grade.list',compact('elevels'));

    }
    public function getGradesm($id)
    {
        $elevels= EducationLevel::find($id);
        return view('grade.listmanage',compact('elevels'));

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
            $elevels=EducationLevel::all();
            return view('grade.create',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();
            return view('grade.create',compact('elevels'));
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
        $g=new Grade;

        $g->grade_name=$request->grade_name;
        $g->level_id=$request->level_id;
        $g->grade_from=$request->grade_from;
        $g->grade_to=$request->grade_to;
        $g->descriptions=$request->descriptions;
        $g->remarks=$request->remarks;
        $g->status=$request->status;
        $g->input_by=Auth::user()->id;
        $g->auth_status='U';
        $g->save();
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
        $gr= Grade::find($id);
        return view('grade.edit',compact('gr'));
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
        $g= Grade::find($request->id);
        $g->level_id=$request->level_id;
        $g->grade_name=$request->grade_name;
        $g->grade_from=$request->grade_from;
        $g->grade_to=$request->grade_to;
        $g->descriptions=$request->descriptions;
        $g->remarks=$request->remarks;
        $g->status=$request->status;
        $g->input_by=Auth::user()->id;
        $g->auth_status='U';
        $g->save();

        return "<h2 class='text-info'>Data saved successful</h2>h2>";
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
        $g= Grade::find($id)->delete();
    }
}
