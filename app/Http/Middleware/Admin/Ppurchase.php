<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class Ppurchase
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
        if(Auth::guard('admin')->user()->p_purchase == 'غير مفعل'){
            return redirect()->route('get.admin.dashboard')->with('status', 'لا تملك صلاحية الدخول لهذه الصفحة');
        }
        return $next($request);
    }
}
