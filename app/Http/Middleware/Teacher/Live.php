<?php

namespace App\Http\Middleware\Teacher;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Live
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('teacher')->user()->live_access == 'غير مفعل'){
            return redirect()->route('get.teacher.dashboard')->with('status', 'ليس لديك صلاحية للدخول الي هذه الصفحة');
        }
        return $next($request);
    }
}
