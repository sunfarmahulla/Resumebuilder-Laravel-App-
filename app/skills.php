<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    //
    protected $table = 'professional_skills';
    protected $fillable = ['user_id','subject','sk_type','sk_percentage'];
}
