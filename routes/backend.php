<?php
use App\Http\Controllers\Backend\BusinessSettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseChapterController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseDetailsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EnrolmentController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::view('/form','backend.admin.pages.form.form')->name('form');
    Route::post('/form-submit',[DashboardController::class,'formSubmit'])->name('form-submit');
    //Category
    Route::resource('/category',CategoryController::class);
    Route::get('/category/{id}/unpublished',[CategoryController::class,'published'])->name('category.published');
    Route::get('/category/{id}/published',[CategoryController::class,'unpublished'])->name('category.unpublished');

    //COURSE
    //..................................................................................................................
    Route::resource('/course',CourseController::class);
    Route::get('/all-course',[CourseController::class,'allCourse'])->name('all-course');
    Route::get('/published-course',[CourseController::class,'publishedCourse'])->name('published-course');
    Route::get('/pending-course',[CourseController::class,'pendingCourse'])->name('pending-course');
    Route::get('/unpublished-course',[CourseController::class,'unpublishedCourse'])->name('unpublished-course');
    Route::get('/decline-course',[CourseController::class,'declineCourse'])->name('decline-course');
    Route::get('/change-status/{id}',[CourseController::class,'changeStatus'])->name('change-status');
    Route::post('/make-published',[CourseController::class,'makePublished'])->name('make-published');
    //..................................................................................................................


    Route::get('/edit-course',[CourseController::class,'editCourse'])->name('course.edit-course');
    Route::group(['middleware'=>'course_id'],function (){
        Route::resource('course-details',CourseDetailsController::class);
        Route::get('/create-by-course/{id}',[CourseDetailsController::class,'createByCourse'])->name('create-by-course');
        //Chapters
        Route::resource('/chapters',CourseChapterController::class);
        Route::get('/course-by-chapter/{id}',[CourseChapterController::class,'courseByChapter'])->name('course-by-chapter');
        Route::get('/chapters-delete/{id}',[CourseChapterController::class,'chaptersDelete'])->name('chapters.delete');
        //Video
        Route::resource('/video',VideoController::class);
        Route::get('/video-index/{id}',[VideoController::class,'videoIndex'])->name('video-index');
    });
   //Teachers
    Route::resource('/teacher',TeacherController::class);
    //Student
    Route::resource('/student',StudentController::class);


    //Enroled Course
    Route::get('/enrole',[EnrolmentController::class,'enrole'])->name('enrole.approve');
    Route::get('/enrole-approve/{id}',[EnrolmentController::class,'enroleApprove'])->name('enrole-approve');
    Route::get('/enrole-decline/{id}',[EnrolmentController::class,'enroleDecline'])->name('enrole-decline');

    //All User
    Route::resource('/user',UserController::class);

    Route::group(['prefix'=>'main','as'=>'main.'],function(){
        Route::get('/course',[CourseController::class,'mainSectionCourse'])->name('course');
//        Route::get('/view-details/{id}',[CourseController::class,'viewDetails'])->name('view-details');
    });

    //All Settings
    Route::get('/setting-index',[BusinessSettingController::class,'index'])->name('setting.index');
    Route::get('/setting-basic',[BusinessSettingController::class,'basicSetting'])->name('setting.basic');


    Route::post('/setting-update',[BusinessSettingController::class,'update'])->name('setting.update');

});


Route::post('/set-course-id',[DashboardController::class,'setCourseId'])->name('set-course-id');
Route::post('/set-chapter-id',[CourseChapterController::class,'setChapterId'])->name('set-chapter-id');
