<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Data\Models\Teacher;
use App\User;
use Validator;
use App\Http\Controllers\Controller;

class TeacherAccountController extends Controller
{
    //

    public function __construct(Teacher $teacher)
    {
    	$this->middleware('auth');
    	$this->query = $teacher;
    }

    public function index()
    {
    	return view('admin.teachers.index');
    }

    public function create()
    {
    	return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
    	$validator = Validate::make($request->all(), Teacher::$validationRules);

    	if($validator->fails()){

    		return redirect()->route('admin.teachers.create');
    	}
    	$generator = App::make('GenerateRegNumber');
    	//the generated number
    	$reg_no = $generator->generateTeacherReg();

    	// logic for adding the profile picture
    	if ($request->hasFile('image')) {
            $image = UploadImage::uploadImage($request->file('image'), 'teacher_photo');
        } else {
            $image = 'default.jpg';
        }

    	$teacher = Teacher::create(array_merge($request->except('image'),[
    		'teacher_reg'=>$reg_no, 
    		'profile_pix' => $image]
    		));

        User::create([
            'username'=> $teacher->teacher_reg,
            'userable_id' => $teacher->id,
            'userable_type' => 'App\\Data\\Models\\Teacher'
        ]);

        return redirect()->route('admin.users.index');

    }

    public function show($id)
    {
    	$teacher = Teacher::findOrFail($id);

    	return view('admin.teachers.show')->('teacher', $teacher);
    }

    public function edit(Request $request, $id)
    {
    	$this->query->findBy($id);

    	$this->validator($request,Teacher::validationRules);
    	if($validator->fails()){

    		return redirect()->route('admin.teachers.create');
    	}
    	
    	$generator = App::make('GenerateRegNumber');
    	//the generated number
    	$reg_no = $generator->generateTeacherReg();

    	// logic for adding the profile picture
    	if ($request->hasFile('image')) {
            $image = UploadImage::uploadImage($request->file('image'), 'teacher_photo');
        } else {
            $image = 'default.jpg';
        }

    	$teacher = Teacher::create(array_merge($request->except('image'),[
    		'teacher_reg'=>$reg_no, 
    		'profile_pix' => $image]
    		));

        User::create([
            'username'=> $teacher->teacher_reg,
            'userable_id' => $teacher->id,
            'userable_type' => 'App\\Data\\Models\\Teacher'
        ]);

        return redirect()->route('admin.users.index');
    }
}
