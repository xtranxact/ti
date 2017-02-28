<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffStrength extends Model
{
    protected $table = "staff_strengths";

    protected $fillable = [
         'username', 'user_id', 'client_id','role_id'
    ];

    public static $rules = ['email'=>'required|email|bail|unique:users','username'=>'bail|required','type'=>'bail|required'];

}
