<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    //
    public function classes()
    {
        return $this::hasMany('\App\ClassLevel','level_id','id');
    }
    public function grades()
    {
        return $this::hasMany('\App\Grade','level_id','id');
    }
    public function exams()
    {
        return $this::hasMany('\App\Examination','level_id','id');
    }

}
