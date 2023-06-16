<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group.
|
*/

Route::namespace('Admin')->group(function () {
    #################################login##############################################
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('get.admin.login');
        Route::post('/login', 'LoginController@login')->name('admin.login');
    });


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::group(['middleware' => 'padmin', 'prefix' => 'admin'], function () {
            Route::get('/', 'AdminController@index')->name('get.admin.index');
            Route::get('create', 'AdminController@create')->name('get.admin.create');
            Route::post('create', 'AdminController@store')->name('post.admin.create');
            Route::get('edit/{id}', 'AdminController@edit')->name('get.admin.edit');
            Route::post('edit/{id}', 'AdminController@update')->name('post.admin.edit');
            Route::get('delete/{id}', 'AdminController@destroy')->name('get.admin.delete');
        });

        ##############################logout##############################################
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');


        ##############################dashboard##############################################
        Route::get('/', 'dashboardController@index')->name('get.admin.dashboard');

        Route::group(['namespace' => 'category'], function () {
            ##############################main-category##############################################
            Route::prefix('main-category')->group(function () {
                Route::get('/', 'MainCategoryController@index')->name('get.admin.main-category');
                Route::get('/create', 'MainCategoryController@create')->name('get.admin.main-category.create');
                Route::post('/create', 'MainCategoryController@store')->name('post.admin.main-category.create');
                Route::get('/edit/{id}', 'MainCategoryController@edit')->name('get.admin.main-category.edit');
                Route::post('/edit/{id}', 'MainCategoryController@update')->name('post.admin.main-category.edit');
                Route::get('/delete/{id}', 'MainCategoryController@destroy')->name('get.admin.main-category.delete');
            });
            ##############################sub-category##############################################
            Route::prefix('sub-category')->group(function () {
                Route::get('/', 'SubCategoryController@index')->name('get.admin.sub-category');
                Route::get('/create', 'SubCategoryController@create')->name('get.admin.sub-category.create');
                Route::post('/create', 'SubCategoryController@store')->name('post.admin.sub-category.create');
                Route::get('/edit/{id}', 'SubCategoryController@edit')->name('get.admin.sub-category.edit');
                Route::post('/edit/{id}', 'SubCategoryController@update')->name('post.admin.sub-category.edit');
                Route::get('/delete/{id}', 'SubCategoryController@destroy')->name('get.admin.sub-category.delete');
            });
        });

        ##############################charging-card##############################################
        Route::prefix('charging-card')->group(function () {
            Route::get('/', 'ChargingCardController@index')->name('get.admin.charging-card');
            Route::get('/create', 'ChargingCardController@create')->name('get.admin.charging-card.create');
            Route::post('/create', 'ChargingCardController@store')->name('post.admin.charging-card.create');
            Route::get('/edit/{id}', 'ChargingCardController@edit')->name('get.admin.charging-card.edit');
            Route::post('/edit/{id}', 'ChargingCardController@update')->name('post.admin.charging-card.edit');
            Route::get('/delete/{id}', 'ChargingCardController@destroy')->name('get.admin.charging-card.delete');
        });
        Route::prefix('shops')->group(function () {
            Route::get('/', 'ShopController@index')->name('get.admin.shops');
            Route::get('/create', 'ShopController@create')->name('get.admin.shops.create');
            Route::post('/create', 'ShopController@store')->name('post.admin.shops.create');
            Route::get('/edit/{id}', 'ShopController@edit')->name('get.admin.shops.edit');
            Route::post('/edit/{id}', 'ShopController@update')->name('post.admin.shops.edit');
            Route::get('/delete/{id}', 'ShopController@destroy')->name('get.admin.shops.delete');
        });

        ##################################teacher##############################################
        Route::prefix('teacher')->group(function () {
            Route::get('/', 'TeacherController@index')->name('get.admin.teacher');
            Route::get('/create', 'TeacherController@create')->name('get.admin.teacher.create');
            Route::post('/create', 'TeacherController@store')->name('post.admin.teacher.create');
            Route::get('/edit/{id}', 'TeacherController@edit')->name('get.admin.teacher.edit');
            Route::post('/edit/{id}', 'TeacherController@update')->name('post.admin.teacher.edit');
            Route::get('/delete/{id}', 'TeacherController@destroy')->name('get.admin.teacher.delete');
            Route::get('/approve/{id}', 'TeacherController@approve')->name('get.admin.teacher.approve');
            Route::get('/send_money/{id}', 'TeacherController@send_money')->name('get.admin.teacher.send_money');
        });

        ##################################student##############################################
        Route::prefix('student')->group(function () {
            Route::get('/', 'StudentController@index')->name('get.admin.student');
            Route::get('/create', 'StudentController@create')->name('get.admin.student.create');
            Route::post('/create', 'StudentController@store')->name('post.admin.student.create');
            Route::get('/edit/{id}', 'StudentController@edit')->name('get.admin.student.edit');
            Route::post('/edit/{id}', 'StudentController@update')->name('post.admin.student.edit');
            Route::get('/delete/{id}', 'StudentController@destroy')->name('get.admin.student.delete');
        });
        ##################################course##############################################
        Route::group(['middleware' => 'pcourse'], function () {
            Route::prefix('course')->group(function () {
                Route::get('/', 'CourseController@index')->name('get.admin.course');
                Route::get('/create', 'CourseController@create')->name('get.admin.course.create');
                Route::post('/create', 'CourseController@store')->name('post.admin.course.create');
                Route::get('/edit/{id}', 'CourseController@edit')->name('get.admin.course.edit');
                Route::post('/edit/{id}', 'CourseController@update')->name('post.admin.course.edit');
                Route::get('/delete/{id}', 'CourseController@destroy')->name('get.admin.course.delete');
            });
            ##################################lesson##############################################
            Route::prefix('lesson')->group(function () {
                Route::get('/', 'LessonController@index')->name('get.admin.lesson');
                Route::get('/create', 'LessonController@create')->name('get.admin.lesson.create');
                Route::post('/create', 'LessonController@store')->name('post.admin.lesson.create');
                Route::get('/edit/{id}', 'LessonController@edit')->name('get.admin.lesson.edit');
                Route::post('/edit/{id}', 'LessonController@update')->name('post.admin.lesson.edit');
                Route::get('/delete/{id}', 'LessonController@destroy')->name('get.admin.lesson.delete');
            });
            ##################################quiz##############################################
            Route::prefix('quiz')->group(function () {
                Route::get('/create', 'QuizController@create')->name('get.admin.quiz.create');
                Route::post('/create', 'QuizController@store')->name('post.admin.quiz.create');
                Route::get('/edit/{id}', 'QuizController@edit')->name('get.admin.quiz.edit');
                Route::post('/edit/{id}', 'QuizController@update')->name('post.admin.quiz.edit');
            });
            ##################################question##############################################
            Route::prefix('question')->group(function () {
                Route::get('/{id}', 'QuestionController@index')->name('get.admin.question');
                Route::get('/create/{id}', 'QuestionController@create')->name('get.admin.question.create');
                Route::post('/create/{id}', 'QuestionController@store')->name('post.admin.question.create');
                Route::get('/edit/{id}', 'QuestionController@edit')->name('get.admin.question.edit');
                Route::post('/edit/{id}', 'QuestionController@update')->name('post.admin.question.edit');
                Route::get('/delete/{id}', 'QuestionController@destroy')->name('get.admin.question.delete');
            });
        });
        ##################################purchase##############################################
        Route::group(['middleware' => 'ppurchase'], function () {
            Route::prefix('purchase')->group(function () {
                Route::get('/', 'PurchaseController@index')->name('get.admin.purchase');
                Route::get('/create', 'PurchaseController@create')->name('get.admin.purchase.create');
                Route::post('/create', 'PurchaseController@store')->name('post.admin.purchase.create');
                Route::get('/edit/{id}', 'PurchaseController@edit')->name('get.admin.purchase.edit');
                Route::post('/edit/{id}', 'PurchaseController@update')->name('post.admin.purchase.edit');
                Route::get('/delete/{id}', 'PurchaseController@destroy')->name('get.admin.purchase.delete');
            });
        });
    });
});
