<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    //
     protected $table = 'language';
    protected $fillable = ['user_id','language','la_type','la_percentage'];
}
