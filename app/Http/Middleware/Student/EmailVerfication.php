<?php

namespace App\Http\Middleware\Student;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmailVerfication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('student')->check()){
            if(Auth::guard('student')->user()->email_verified_at == null){
                Auth::guard('student')->logout();
                return redirect()->route('login')->with('status', 'تم ارسال رسالة تفعيل الى بريدك الالكتروني');
            }else
            {
                return $next($request);
            }
        }
        return $next($request);
    }
}
