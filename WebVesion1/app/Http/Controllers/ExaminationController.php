<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EducationLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\School;
use App\Examination;

class ExaminationController extends Controller
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
            return view('exams.index',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();

            return view('exams.index',compact('elevels'));
        }
    }
    public function manage()
    {
        //
        if(Auth::user()->role =="Superuser")
        {
            $elevels=EducationLevel::all();
            return view('exams.manage',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();

            return view('exams.manage',compact('elevels'));
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
            $elevels=EducationLevel::all();
            return view('exams.create',compact('elevels'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $elevels=EducationLevel::where('school_id','=',$school_id)->get();

            return view('exams.create',compact('elevels'));
        }
    }


    ///Reports
    public function reports()
    {
        //
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
        $ex=new Examination;
        $ex->ExamCode=$request->ExamCode;
        $ex->Exam_Name=$request->Exam_Name;
        $ex->Exam_Description=$request->Exam_Description;
        $ex->level_id=$request->level_id;
        $ex->input_by=Auth::user()->id;
        $ex->auth_status="U";
        $ex->status=$request->status;
        $ex->save();
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
        $ex=Examination::find($id);
        return view('exams.edit',compact('el'));
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
    public function getLevelExams($id)
    {
        //
        $el =EducationLevel::find($id);
        return view('exams.list',compact('el'));
    }
    public function getLevelExamsm($id)
    {
        //
        $el =EducationLevel::find($id);
        return view('exams.listm',compact('el'));
    }

}
