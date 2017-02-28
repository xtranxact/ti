<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $email_verified = Auth::user()->email_verified;
            if($email_verified == 0){
                $request->session()->put(['verify_email'=>Auth::user()->email,'verify_pass'=>Auth::user()->password,'verify_name'=>Auth::user()->firstname. ' '. Auth::user()->lastname]);
               return redirect()->route('verify_email');
            }
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
