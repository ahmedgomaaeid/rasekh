<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register teacher routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "teacher" middleware group.
|
*/

Route::namespace('Teacher')->group(function () {
    #################################login##############################################
    Route::group(['middleware' => 'guest:teacher'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('get.teacher.login');
        Route::post('/login', 'LoginController@login')->name('teacher.login');
        Route::get('/register', 'LoginController@getRegister')->name('get.teacher.register');
        Route::post('/register', 'LoginController@register')->name('teacher.register');
    });


    Route::group(['middleware' => 'auth:teacher'], function () {
        Route::group(['middleware' => 'teacher.approved'], function () {
            ##############################dashboard##############################################
            Route::get('/', 'DashboardController@index')->name('get.teacher.dashboard');
            Route::get('/bbb',function(){
                return view('teacher.bbb');
            });
            ##############################profile##############################################
            Route::get('/profile', 'ProfileController@index')->name('get.teacher.profile');
            Route::post('/profile', 'ProfileController@update')->name('post.teacher.profile');
            Route::post('/profile/password', 'ProfileController@updatePassword')->name('post.teacher.profile.password');
            Route::post('/profile/image', 'ProfileController@updateImage')->name('post.teacher.profile.image');
            ##############################logout##############################################
            Route::get('/logout', 'LoginController@logout')->name('teacher.logout');

            ##############################lesson##############################################
            Route::group(['middleware' => 'teacher.course'], function () {
                Route::prefix('lesson')->group(function () {
                    Route::get('/', 'LessonController@index')->name('get.teacher.lesson');
                    Route::get('/create', 'LessonController@create')->name('get.teacher.lesson.create');
                    Route::post('/create', 'LessonController@store')->name('post.teacher.lesson.create');
                    Route::get('/edit/{id}', 'LessonController@edit')->name('get.teacher.lesson.edit');
                    Route::post('/edit/{id}', 'LessonController@update')->name('post.teacher.lesson.edit');
                });
                ##############################quiz##############################################
                Route::prefix('quiz')->group(function () {
                    Route::get('/create', 'QuizController@create')->name('get.teacher.quiz.create');
                    Route::post('/create', 'QuizController@store')->name('post.teacher.quiz.create');
                    Route::get('/edit/{id}', 'QuizController@edit')->name('get.teacher.quiz.edit');
                    Route::post('/edit/{id}', 'QuizController@update')->name('post.teacher.quiz.edit');
                });
                ##############################question##############################################
                Route::prefix('question')->group(function () {
                    Route::get('/{id}', 'QuestionController@index')->name('get.teacher.question');
                    Route::get('/create/{id}', 'QuestionController@create')->name('get.teacher.question.create');
                    Route::post('/create/{id}', 'QuestionController@store')->name('post.teacher.question.create');
                    Route::get('/edit/{id}', 'QuestionController@edit')->name('get.teacher.question.edit');
                    Route::post('/edit/{id}', 'QuestionController@update')->name('post.teacher.question.edit');
                    Route::get('/delete/{id}', 'QuestionController@destroy')->name('get.teacher.question.delete');
                });
                ##############################chat##############################################
                Route::prefix('chat')->group(function () {
                    Route::get('/chat/{id}', 'ChatController@chat')->name('get.teacher.chat.chat');
                });
            });
            Route::group(['middleware' => 'teacher.live'], function () {
                ##############################zoom-integration##############################################
                Route::prefix('zoom-integration')->group(function () {
                    Route::get('/', 'ZoomIntegrationController@index')->name('get.teacher.zoom-integration');
                    Route::post('/', 'ZoomIntegrationController@store')->name('post.teacher.zoom-integration');
                });
                ##############################zoom-meeting##############################################
                Route::prefix('zoom-meeting')->group(function () {
                    Route::get('/', 'ZoomMeetingController@index')->name('get.teacher.zoom-meeting');
                    Route::get('/create', 'ZoomMeetingController@create')->name('get.teacher.zoom-meeting.create');
                    Route::post('/create', 'ZoomMeetingController@store')->name('post.teacher.zoom-meeting.create');
                    Route::get('/delete/{id}', 'ZoomMeetingController@destroy')->name('get.teacher.zoom-meeting.delete');
                });
                Route::get('meeting', 'ZoomMeetingController@meeting')->name('teacher.meeting');
                Route::get('meet/{id}', 'ZoomMeetingController@meetingRedirect')->name('teacher.meet');
            });
        }); 
    });
});
