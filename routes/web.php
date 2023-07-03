<?php

use App\Http\Controllers\Student\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/
Route::get('/phpinfo', function() {
    phpinfo();
});
Route::group(['namespace' => 'Student'], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/all-courses', 'AllCoursesController@index')->name('allCourses');
    route::get('/courses/{id}', 'CoursesController@index')->name('courses');
    Route::get('/teachers/{id}', 'TeachersController@index')->name('teachers');
    Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('addToCart');    
    Route::get('/cart-remove-item/{id}', 'CartController@removeItem')->name('cart.removeItem');
    Route::get('/cart-clear', 'CartController@clearCart')->name('cart.clear');
    Route::get('/contact', 'FrontController@contact')->name('contact');
    Route::get('offers', 'FrontController@offers')->name('offers');
    Route::get('about', 'FrontController@about')->name('about');
    Route::get('cards', 'FrontController@cards')->name('cards');
    Route::group(['middleware' => ['auth:student','student.verify']], function () {
        Route::get('/cart', 'CartController@index')->name('cart');
        Route::get('/my-courses', 'MyCoursesController@index')->name('myCourses');
        Route::get('pay', [PaymentController::class,'pay'])->name('pay');
        Route::get('lahza-pay/{payment}', [PaymentController::class,'lahzaPay'])->name('lahza.pay');
        Route::get('/course/{id}', 'VideoController@redirect')->name('course');
        Route::get('/course/{id}/lesson/{lesson}', 'VideoController@lesson')->name('lesson');
        Route::post('lesson/completed', 'VideoController@lessonCompleted')->name('lesson.completed');
        Route::post('send-quiz', 'VideoController@sendQuiz')->name('sendQuiz');
        Route::post('send-question', 'VideoController@sendQuestion')->name('sendQuestion'); 
        Route::get('/payments/verify/{payment?}',[PaymentController::class,'payment_callback'])->name('verify-payment');
        Route::get('/charging', 'PaymentController@charging')->name('charging');
        Route::post('/charge', 'PaymentController@charge')->name('charge');
        Route::get('/profile', 'ProfileController@profile')->name('profile');
        Route::post('/profile', 'ProfileController@update')->name('profile.update');
        Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
        Route::post('/profile/password', 'ProfileController@passwordUpdate')->name('profile.password.update');
        Route::get('/profile/image', 'ProfileController@image')->name('profile.image');
        Route::post('/profile/image', 'ProfileController@imageUpdate')->name('profile.image.update');
        Route::get('chat', 'ChatController@index')->name('chats');
        Route::get('chat/{id}', 'ChatController@chat')->name('chat');
        Route::post('chat/send', 'ChatController@send')->name('chat.send');
        Route::get('meeting', 'VideoController@meeting')->name('meeting');
        Route::get('meet/{id}', 'VideoController@meetingRedirect')->name('meet');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });


    ##########################registeration##########################
    Route::group(['middleware' => 'guest:student'], function () {
        Route::get('/register', 'RegisterController@index')->name('register');
        Route::post('/register', 'RegisterController@register')->name('post.register');
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@login')->name('post.login');
        Route::get('/verify/{token}', 'RegisterController@verify')->name('student.verify');
        Route::get('/forget-password', 'ResetPasswordController@index')->name('forget.password');
        Route::post('/forget-password', 'ResetPasswordController@send')->name('post.forget.password');
        Route::get('/reset-password/{token}', 'ResetPasswordController@reset')->name('reset.password');
        Route::post('/reset-password', 'ResetPasswordController@resetPassword')->name('post.reset.password');
    });
});
