<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use App\School;
use Illuminate\Support\Facades\Auth;
use App\Audit;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $school_id=Auth::user()->school_id;
        $departments=Department::where('school_id','=',$school_id)->get();
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('departments.create');
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
             $ertd="";
            if (count($errors) > 0){
                $ertd .= ' <div class="alert alert-danger">' ;
                $ertd .= '<ul>' ;
                foreach ($errors->all() as $error)
                {
                    $ertd .= ' <li>$error</li>';
                }

                $ertd .= '</ul>';
                $ertd .= '</div>';
            }
        }
        else {
            $school_id=Auth::user()->school_id;
            $dp = new Department;
            $dp->school_id=$school_id;
            $dp->dept_name=$request->dept_name;
            $dp->descriptions=$request->descriptions;
            $dp->status=$request->status;
            $dp->input_by=Auth::user()->id;
            $dp->save();

            //Process department code
            $dp->dept_code='DE'.$dp->school_id.'-'.$dp->id;

            $dp->save();

            //Process Autit trail

            return "Department saved successful";
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
        $departments=Department::find($id);
        return view('departments.show',compact('departments'));
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
        $departments=Department::find($id);
        return view('departments.edit',compact('departments'));
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
            $ertd="";
            if (count($errors) > 0){
                $ertd .= ' <div class="alert alert-danger">' ;
                $ertd .= '<ul>' ;
                foreach ($errors->all() as $error)
                {
                    $ertd .= ' <li>$error</li>';
                }

                $ertd .= '</ul>';
                $ertd .= '</div>';
            }
        }
        else {
            $id = $request->id;

            $school_id = Auth::user()->school_id;
            $dp = Department::find($id);
            $dp->school_id = $school_id;
            $dp->dept_name = $request->dept_name;
            $dp->descriptions = $request->descriptions;
            $dp->status = $request->status;
            $dp->input_by = Auth::user()->id;
            $dp->save();

            //Process department code
            $dp->dept_code = 'DE' . $dp->school_id . '-' . $dp->id;

            $dp->save();

            //Process Autit trail

            return "Department saved successful";
        }
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
        $departments=Department::find($id);
        $departments->delete();
        return "Department deleted successful";
    }
}
