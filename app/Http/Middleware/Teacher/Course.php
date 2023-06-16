<?php

namespace App\Http\Middleware\Teacher;

use Closure;
use Illuminate\Support\Facades\Auth;

class Course
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
        if(Auth::guard('teacher')->user()->course_access == 'غير مفعل'){
            return redirect()->route('get.teacher.dashboard')->with('status', 'ليس لديك صلاحية للدخول الي هذه الصفحة');
        }
        return $next($request);
    }
}
