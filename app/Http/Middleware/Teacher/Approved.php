<?php

namespace App\Http\Middleware\Teacher;

use Closure;
use Illuminate\Support\Facades\Auth;

class Approved
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
        if(Auth::guard('teacher')->user()->status == 'غير مفعل'){
            Auth::guard('teacher')->logout();
            return redirect()->route('get.teacher.login')->with('status', 'حسابك مقفل يرجى الاتصال بالادارة');
        }
        if(Auth::guard('teacher')->user()->approved == 0){
            Auth::guard('teacher')->logout();
            return redirect()->route('get.teacher.login')->with('status', 'يرجى الانتظار لتفعيل حسابك');
        }
        return $next($request);
    }
}
