<?php

namespace App\Exceptions;

use App\Models\Notify;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if($exception->getFile() != '/www/wwwroot/rasekhpal.com/vendor/laravel/framework/src/Illuminate/Routing/AbstractRouteCollection.php')
        {
            //check what guard is using
            $uid = 0;
            if (auth()->guard('teacher')->check()) {
                $guard = 'teacher';
                $uid = auth()->guard('teacher')->user()->id;
            } elseif (auth()->guard('admin')->check()) {
                $guard = 'admin';
                $uid = auth()->guard('admin')->user()->id;
            } else {
                $guard = 'student';
                if (auth()->guard('student')->check()) {
                    $uid = auth()->guard('student')->user()->id;
                }
            }
            $notify = new Notify();
            $notify->teacher_id = 0;
            $notify->text = 'form '.$guard.' with id='.$uid.' <br> Error: ' . $exception->getMessage() . '<br> in file: ' . $exception->getFile() . '<br> on line: ' . $exception->getLine() . 'code: ' . $exception->getCode();
            $notify->seen = 0;
            $notify->type = 2;
            $notify->save();
            
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}
