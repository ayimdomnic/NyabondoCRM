<?php

namespace App\Data\Models;

use App\User;
use App\Data\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'gender','class_id', 'class_type_id', 'profile_pix', 'teacher_reg', 'address', 'phone','created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */

    public static $validationRules = [
        'name' => 'required|string',
        'gender' => 'required',
        'class_id' => 'required|integer',
        'class_type_id' => 'required|integer',
        'address' => 'required|string',
        'phone' => 'required|digits_between:6,20',
        'profile_pix' => 'image',
    ];

    /*
     * Some Validation rules for this model's new instance.
     */

    public static $updateRules = [
        'address' => 'string',
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    ];

    public function user()
    {
    	return $this->morphOne(User::class, 'userable');
    }

    public function teacherClass()
    {
    	return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
