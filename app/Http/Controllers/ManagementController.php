<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use Validator;
use Input;
use Auth;

use App\User;
use App\Company;
use App\Terminology;

class ManagementController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['register','verify_email']]);
    }

    public function register(Request $request) {
		if ($request->isMethod('post')) {
            $validate = Validator::make($request->all(), Company::$rules);
            if($validate->passes()){   
                $request['password'] = uniqid();
                $save = Company::save_company($request);
                if($save === "serverError") {
                	return response()->json(['invalid'=> true, 'msg'=> 'An error has occured. Please Retry']); }
                $request->session()->put(['verify_email'=>$request->input('email'),'verify_pass'=>$request->password,'verify_name'=>$request->firstname. ' '. $request->lastname]);
            	return response()->json(['success'=> true, 'msg' => 'Registration successfull', 'url' => 'register/verify-email' ]);
            }
            return response()->json(['invalid'=>true, 'errors'=> $validate->messages(),'msg' => "Please fill out missing form fields"]);
        }    
        return view('management.register');
	}

    public function verify_email(Request $request){
        $email = $request->session()->get('verify_email');
        $name = $request->session()->get('verify_name');
        if($request->isMethod('post')){
            $verify = User::verify_email($email,$request->password);
            if($verify){
                return response()->json(['success'=> true, 'msg' => 'Verification successfull', 'url' => 'register/registration-success' ]);
            }
            return response()->json(['invalid'=>true,'msg'=>"Passwords do not match, Please confirm with password sent to your email and Retry"]);
        }
        return view('management.verify_email')->with(['email'=>$email,'name'=>$name]);
    }

    public function reg_success(Request $request){
        return view('management.reg_success');
    }

}