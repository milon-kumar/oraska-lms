<?php


use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\PostController;
use App\Http\Controllers\Student\VideoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'student','as'=>'student.','middleware'=>['auth','student']],function (){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    //Student Courses
    Route::get('/courses',[CourseController::class,'courses'])->name('courses');
    Route::get('/course-details/{slug}',[CourseController::class,'courseDetails'])->name('course-details');
    Route::get('/class-video/{slug}',[CourseController::class,'classVideo'])->name('class-video');
    Route::get('/show-video/{slug}',[VideoController::class,'showVideo'])->name('show-video');


    //Community Post
    Route::resource('/post',PostController::class);
});
