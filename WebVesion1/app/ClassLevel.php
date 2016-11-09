<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassLevel extends Model
{
    //
    public function stream()
    {
        return $this::hasMany('\App\ClassStream','class_id','id');
    }
}
