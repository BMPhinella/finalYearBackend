<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ageGroup extends Model
{
    protected $table='AgeGroup';
    protected $fillable=['ageGroup_id','age','updated_by'];
}
