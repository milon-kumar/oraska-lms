<?php
use App\Http\Controllers\Backend\BusinessSettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ComplainController;
use App\Http\Controllers\Backend\CourseChapterController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseDetailsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EnrolmentController;
use App\Http\Controllers\Backend\OpinionController;
use App\Http\Controllers\Backend\PdfController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/slider',SliderController::class);
    Route::resource('/teacher',TeacherController::class);
    Route::get('/our-talk',[DashboardController::class,'ourTalk'])->name('our-talk');
    Route::resource('/opinion',OpinionController::class);


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


    Route::group(['middleware'=>'course_id'],function (){
        //Preview Course
        Route::get('/preview-course',[CourseController::class,'previewCourse'])->name('course.preview-course');
        Route::resource('course-details',CourseDetailsController::class);
        //Change Course Free
        Route::get('/change-course-free',[CourseDetailsController::class,'changeCourseFree'])->name('change-course-free');
        Route::post('/update-course-free',[CourseDetailsController::class,'updateCourseFree'])->name('update-course-free');
        Route::get('/create-by-course/{id}',[CourseDetailsController::class,'createByCourse'])->name('create-by-course');
        //Chapters
        Route::resource('/chapters',CourseChapterController::class);
        Route::get('/course-by-chapter/{id}',[CourseChapterController::class,'courseByChapter'])->name('course-by-chapter');
        Route::get('/chapters-delete/{id}',[CourseChapterController::class,'chaptersDelete'])->name('chapters.delete');
        //Video
        Route::resource('/video',VideoController::class);
        Route::get('/video-index/{id}',[VideoController::class,'videoIndex'])->name('video-index');
        //Course Copy
        Route::get('/course-copy',[CourseController::class,'courseCopy'])->name('course-copy');
        //Delete All Course Content
        Route::get('/course-delete',[CourseController::class,'courseDelete'])->name('course-delete');
//<-------------=============== Edit Course Tags Start =================---------------->//
        Route::resource('/pdf',PdfController::class);
        Route::get('/edit-course',[CourseController::class,'editCourse'])->name('course.edit-course');
        Route::get('/all-pdf/{type}',[PdfController::class,'lectureNotes'])->name('pdf.all-pdf');
        Route::get('/pdf-create/{type}',[PdfController::class,'pdfCreate'])->name('pdf.pdf-create');
        Route::post('/pdf-store',[PdfController::class,'pdfStore'])->name('pdf.pdf-store');

//<-------------=============== Post Section Start =================---------------->//
        Route::resource('/post',PostController::class);

//<-------------=============== Complain Start =================---------------->//
        Route::resource('/complain',ComplainController::class);
        Route::resource('/student',StudentController::class);
    });

    //Enroled Course
    Route::get('/enrole',[EnrolmentController::class,'enrole'])->name('enrole.approve');
    Route::get('/enrole-approve/{id}',[EnrolmentController::class,'enroleApprove'])->name('enrole-approve');
    Route::get('/enrole-decline/{id}',[EnrolmentController::class,'enroleDecline'])->name('enrole-decline');

    //All User
    Route::resource('/user',UserController::class);

    //Role Management
    Route::resource('/role',RoleController::class);

    //All Settings
    Route::get('/setting-index',[BusinessSettingController::class,'index'])->name('setting.index');
    Route::get('/account',[BusinessSettingController::class,'account'])->name('setting.account');
    Route::post('/change-email',[BusinessSettingController::class,'changeEmail'])->name('setting.change-email');
    Route::post('/change-password',[BusinessSettingController::class,'changePassword'])->name('setting.change-password');
    Route::get('/setting-basic',[BusinessSettingController::class,'basicSetting'])->name('setting.basic');
    Route::get('/profile',[BusinessSettingController::class,'profile'])->name('setting.profile');
    Route::get('/profile-edit/{id}',[BusinessSettingController::class,'profileEdit'])->name('setting.profile.edit');
    Route::post('/profile-update/{id}',[BusinessSettingController::class,'profileUpdate'])->name('setting.profile.update');

//<-------------=============== Setting Start =================---------------->//
    Route::group(['prefix'=>'setting','as'=>'setting.'],function (){
        Route::post('/update',[BusinessSettingController::class,'update'])->name('update');
        Route::post('/web-controls',[BusinessSettingController::class,'webControls'])->name('web-controls');
        Route::post('/edit-course',[BusinessSettingController::class,'editCourse'])->name('edit-course');
    });
//<-------------=============== Setting End =================---------------->//
});

Route::post('/set-course-id',[DashboardController::class,'setCourseId'])->name('set-course-id');
Route::post('/set-chapter-id',[CourseChapterController::class,'setChapterId'])->name('set-chapter-id');
