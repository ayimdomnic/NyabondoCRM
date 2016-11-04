<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    //
    protected $table = 'classes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'group_id'];

    public function student()
    {
        return $this->hasMany('App\Data\Models\Student');
    }
    public function teacher()
    {
        return $this->hasOne('App\Data\Models\Teacher');
    }
    public function classGroup()
    {
        return $this->belongsTo('App\Data\Models\ClassGroup', 'group_id');
    }
}
