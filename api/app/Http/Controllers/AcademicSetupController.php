<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AcademicSetup;
use Illuminate\Support\Facades\Auth;
use App\School;

class AcademicSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
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
        $acsserch=AcademicSetup::where('school_id','=',$request->school)->get();
        if(count($acsserch) > 0)
        {
            $acs=AcademicSetup::where('school_id','=',$request->school)->get()->first();
            $acs->current_year=$request->current_year;
            $acs->start_date=date("Y-m-d",strtotime($request->startdate));
            $acs->end_date=date("Y-m-d",strtotime($request->enddate));
            $acs->input_by=Auth::user()->id;
            $acs->save();
        }
        else
        {
            $acs=new AcademicSetup;
            $acs->school_id=$request->school;
            $acs->current_year=$request->current_year;
            $acs->start_date=date("Y-m-d",strtotime($request->startdate));
            $acs->end_date=date("Y-m-d",strtotime($request->enddate));
            $acs->input_by=Auth::user()->id;
            $acs->save();
        }

        return "";
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function currentYear()
    {
        //
        if(Auth::user()->role =="Superuser")
        {
            $schools=School::all();
            return view('setups.admcyear',compact('schools'));
        }
        else
        {
            $school_id=Auth::user()->school_id;
            $academicsetup=AcademicSetup::where("school_id",'=',$school_id)->get()->first();
            return view('setups.cyear',compact('academicsetup'));
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function classes()
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function grade()
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function examinationTypes()
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function examinationPeriod()
    {
        //
    }

    public function academicCalendar()
    {
        //
    }

    public function subjectAllocation()
    {
        //
    }
    public function classAllocation()
    {
        //
    }
    public static function getYear($id)
    {
        $academicsetup=AcademicSetup::where("school_id",'=',$id)->first();
        if(count($academicsetup)>0) {

            $school_id=$academicsetup->school_id;
            $current_year=$academicsetup->current_year;
            $end_date=$academicsetup->end_date;
            $start_date=$academicsetup->start_date;


            echo '  <div class="col-sm-2 col-sm-offset-2">
                                        <label>Academic Year</label>
                                        <input type="text" class="form-control" data-mask="9999" name="current_year" placeholder="Year (YYYY) eg 2015" value="'.$current_year.'" required="required">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Start date</label>
                                        <input type="text" name="startdate" class="form-control datepicker-input" required="required" value="'.$start_date.'">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>End date</label>
                                        <input type="text" name="enddate" class="form-control datepicker-input" required="required" value="'.$end_date.'">
                                    </div>';


           } else {
            echo '  <div class="col-sm-2 col-sm-offset-2">
                                        <label>Academic Year</label>
                                        <input type="text" class="form-control" data-mask="9999" name="current_year" placeholder="Year (YYYY) eg 2015" value="" required="required">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Start date</label>
                                        <input type="text" name="startdate" class="form-control datepicker-input" required="required" value="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>End date</label>
                                        <input type="text" name="enddate" class="form-control datepicker-input" required="required" value="">
                                    </div>';
        }
    }
    public static function getCYear($id)
    {
        $academicsetup=AcademicSetup::where("school_id",'=',$id)->first();
        if(count($academicsetup)>0) {
            return $academicsetup->current_year;
        } else { return "";}
    }
}
