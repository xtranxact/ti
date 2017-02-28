<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mail\PostRegVerifyEmail;

use Mail;
use DB;

class Company extends Model
{ 
	public $fillable = ['user_id', 'staff_strength_id', 'company_name','phone_number'];
    
    public static $rules = ['firstname'=>'bail|required','lastname'=>'bail|required','company_name'=>'bail|required','phone_number'=>'bail|required','staff_strength_id'=>'bail|required','email'=>'required|email|bail|unique:users'];

    public function user() { return $this->belongsTo('App\User', 'user_id', 'id'); }
 
    static function save_company($data, $id = null){	
        $input = $data->all();    
        DB::beginTransaction();
        try{
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input); 
            $user->roles()->attach(1); // 1 means the user type is company
            User::find($user->id)->companies()->create($input);
        }catch(\Exception $e){
            DB::rollback();
            return 'serverError';
        }
        DB::commit();
        $data->merge(array('password'=>$data->password));
        Mail::to($input['email'])->send(new PostRegVerifyEmail($data));
        return true;
    }

    static function getCompanyID($id){
        return Company::where('user_id',$id)->first()->id;
    }

    static function getDetails($id){
        return Company::where('id',$id)->first();
    }
}
