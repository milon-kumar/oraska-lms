<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\EnroleController;
use App\Http\Controllers\Frontend\HomeContoller;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'frontend.'],function (){
    Route::get('/',[HomeContoller::class,'home'])->name('home');
    Route::get('/details/{slug}',[CourseController::class,'details'])->name('details');
    Route::get('/instructor',[HomeContoller::class,'allInstructor'])->name('instructor');
    //Enrol
    Route::get('/enrole/{slug}',[EnroleController::class,'enrole'])->name('enrole');
    Route::post('/enrole-store',[EnroleController::class,'storeEnrole'])->name('enrole.store');
    Route::get('/complete-enrole',[EnroleController::class,'completeEnrole'])->name('complete-enrole');
});

