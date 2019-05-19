<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobbies extends Model
{
    //
     protected $table = '_hobbies';
    protected $fillable = ['user_id','Hobbies'];
}
