<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->segment(1) == 'admin'){
                return route('get.admin.login');
            }elseif($request->segment(1) == 'teacher'){
                return route('get.teacher.login');
            }else{
            return route('login');
            }
        }
    }
}
