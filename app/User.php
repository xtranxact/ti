<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; 

    public function companies () { return $this->hasMany('App\Company','user_id', 'id'); }

    public function roles(){
		return $this->belongsToMany('App\Role', 'role_user','user_id', 'role_id');
    }

    protected $fillable = [
        'email', 'password','firstname', 'lastname'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullname'];

    public function getFullnameAttribute(){
        return $this->firstname . ' '.$this->lastname;
    }

    public function setFullnameAttribute(){
        $this->attributes['fullname'] = $this->firstname . ' '.$this->lastname;
    }

    static function verify_email($email,$pass){
        $verify = Auth::attempt(['email' => $email, 'password' => $pass]);
        if($verify){
            User::where('email',$email)->update(['email_verified'=>1]);
            return true;
        }
        return false;
    }

    static function getUsers($id){
        return  DB::table('users')
            ->select(DB::raw("users.lastname, users.firstname,users.id"))
                ->join('companies', 'users.id', '=' , 'companies.user_id')
               // ->join('users', 'users.id', '=' , 'clients.user_id')
                ->where('companies.id',$id)
                //->orWhere('',$yr)->where('payrolls.client_id',$clientID)
                ->get();
       
    }
}

