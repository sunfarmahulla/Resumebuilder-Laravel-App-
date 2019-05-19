<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{ 
    protected $table = 'contact';
    protected $fillable = ['user_id','firstName','MiddleName','endName','email','Phone','Address','state','city','zip','country'];
}
