<?php


use App\Http\Controllers\Student\ComplainController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\PostController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\VideoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'student','as'=>'student.','middleware'=>['auth','student']],function (){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    //Student Courses
    Route::get('/courses',[CourseController::class,'courses'])->name('courses');
    Route::get('/course-details/{slug}',[CourseController::class,'courseDetails'])->name('course-details');
    Route::get('/class-video/{slug}',[CourseController::class,'classVideo'])->name('class-video');
//---------------=============== Bye A NEW Course ==============------------------------//
    Route::get('/buy-course',[CourseController::class,'buyCourse'])->name('buy-course');
    Route::get('/buy-course/details/{slug}',[CourseController::class,'buyCourseDetails'])->name('buy-course.details');

    //SET Course Id Here
    Route::group(['middleware'=>'student_course_id'],function (){
        //---------------=============== Post Section ==============------------------------//
        Route::resource('/post',PostController::class);

        //---------------=============== Complain Section ==============------------------------//
        Route::resource('/complain',ComplainController::class);

        Route::get('/chapter',[CourseController::class,'chapter'])->name('chapter');
        Route::get('/pdf/{type}',[CourseController::class,'pdf'])->name('pdf');
        Route::get('/pdf-show/{id}',[CourseController::class,'pdfShow'])->name('pdf.show');
        Route::get('/show-video/{id}',[VideoController::class,'showVideo'])->name('show-video');

    });

//---------------=============== Student Profile ==============------------------------//
    Route::get('/profile-edit/{id}',[ProfileController::class,'profileEdit'])->name('profile.edit');
    Route::post('/profile-update/{id}',[ProfileController::class,'profileUpdate'])->name('profile.update');

//---------------=============== Settings ==============------------------------//
    Route::get('/setting.account',[SettingController::class,'settingAccount'])->name('setting.account');
    Route::post('/change-email',[SettingController::class,'changeEmail'])->name('change-email');
    Route::post('/change-password',[SettingController::class,'changePassword'])->name('change-password');
});

Route::post('/set-student-course-id',[DashboardController::class,'setStudentCourseId'])->name('set-student-course-id');
