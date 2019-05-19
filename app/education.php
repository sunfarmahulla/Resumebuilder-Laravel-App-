<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    //
     protected $table = 'education';
    protected $fillable = ['user_id','qualification','SchoolName','completeEdu','edu_year','edu_percentage'];
}
