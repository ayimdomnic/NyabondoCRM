<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    //

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','gender', 'student_reg', 'class_id', 'class_type_id','dob', 'phone', 'profile_pix', 'created_at', 'updated_at'];

    /*
     * Some Validation rules for this model's new instance.
     */
    public static $validationRules = [
        'name' => 'required|string',
        'gender' => 'required',
        'class_id' => 'required|integer',
        'class_type_id' => 'required|integer',
        'dob' => 'required|date',
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    ];


    public static $updateRules = [
        'phone' => 'digits_between:6,20',
        'profile_pix' => 'image',
    ];

    public function result()
    {
        return $this->hasMany('App\Data\Models\Result');
    }

    public function studentClass()
    {
        return $this->belongsTo('App\Data\Models\StudentClass', "class_id");
    }

    public function classType()
    {
        return $this->belongsTo('App\Data\Models\ClassType', 'class_type_id');
    }
    
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

}
