<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests;
use Redirect;

use App\Company;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
       $this->middleware('guest', ['except' => ['logout','revoke']]);
    }

    protected function redirectTo()
    {
        $email_verified = Auth::user()->email_verified;
        if($email_verified == 0){
           return redirect()->route('verify_email');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout(); 
        $request->session()->flush();
        //Session::deleteData(session()->getId());
        $request->session()->regenerate();

        return redirect('/');
    }

    public function get_login(Request $request)
    {
        if(Auth::user()){
            return  Redirect::to("/dashboard");
        }
        //Since I am using ajac to login this stores the intended url in session so that i cn access it later
        $request->session()->put('url.intended', url()->previous());
        return view('management.sign_in')->with('title','Login to TimeBill');
    }

    //I wrote this function to overwrite the default laravel login Behaviour 
    // Daniel Uche Daniel
    public function login(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $credentials = $this->credentials($request);
        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn($this->throttleKey($request));
        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);
        if($request->ajax()){
            return response()->json(['invalid'=>true, 'msg'=> $message], 401);
        }
        redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([$this->username() => $message]); 
    }

    protected function sendLoginResponse(Request $request)
    {
        $email_verified = Auth::user()->email_verified;
        $company = Company::getDetails(Auth::user()->id);
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if($email_verified == 0){
            $request->session()->put(['verify_email'=>Auth::user()->email,'verify_pass'=>Auth::user()->password,'verify_name'=>$company->firstname.' '. $company->lastname]);
            if($request->ajax()){          
                return response()->json(['success'=>true, 'redirectUrl'=>'register/verify-email']);
            }else{
                return redirect()->route('verify_email');
            }
            Auth::logout();
        }else{
            return response()->json(['success'=>true, 'redirectUrl'=>'dashboard']);
        }
        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath()); 
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        if($request->wantsJson()){
            return response()->json(['invalid'=>true, 'msg'=> Lang::get('auth.failed')], 403);
        }
       return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]); 
    }
}
