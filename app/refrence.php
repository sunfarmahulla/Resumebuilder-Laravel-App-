<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class refrence extends Model
{
    //
    protected $table = 'refrence';
    protected $fillable = ['user_id','ref_name','relationship','ref_phone','company','ref_email','ref_address'];
}
