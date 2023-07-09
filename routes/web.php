<?php

use App\Http\Controllers\Admin\MediaFileController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\System\RepairController;
use Illuminate\Support\Facades\Route;


// посадочная test
Route::get('/', [SiteController::class, 'index2'])->name('site.index');

//Route::get('/', [SiteController::class, 'index'])->name('site.index'); // УБРАТЬ!!!
Route::get('about-us', [SiteController::class, 'aboutUs'])->name('site.about-us');
Route::get('contacts', [SiteController::class, 'contacts'])->name('site.contacts');
Route::get('privacy-policy', [SiteController::class, 'privacyPolicy'])->name('site.privacy-policy');
Route::get('offer-agreement', [SiteController::class, 'offerAgreement'])->name('site.offer-agreement');
Route::get('contacts', [SiteController::class, 'contacts'])->name('site.contacts');
Route::get('courses/course-{course}/show', [SiteController::class, 'showCourse'])->name('site.course-show');
Route::post('feedback', [SiteController::class, 'feedback'])->name('feedback');

Route::get('/email/verify', [AuthController::class, 'verifyEmail'])
    ->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'emailVerification'])
    ->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify/success', [AuthController::class, 'successVerification'])
    ->middleware(['auth', 'verified'])->name('verification.success');

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

/* TEACHER'S DASHBOARD */
/*Route::middleware(['auth', 'verified', 'locale', 'role:teacher'])->group(function (){
    Route::get('teacher-panel', [CourseController::class, 'index'])->name('teacher.panel');
});*/

/* AJAX */
Route::get('ajax/files/{fileType}', [MediaFileController::class, 'getFilesByAjax'])->name('ajax.get-files');
Route::get('ajax/promo/{code}', [PromocodeController::class, 'getPromoCodeData'])->name('ajax.get-promo-code');




Route::middleware(['guest'])->group(function (){
    Route::post('reset-user-password', [AuthController::class, 'resetPassword'])->name('password.update');
});


/* Scripts for Changing Database */
//Route::get('media/change-paths', [SuperuserController::class, 'changePaths'])
//    ->middleware(['auth', 'role:admin'])->name('media.change-paths');

/* Update all index_number for each entry */
/*Route::get('topics/set-numbers', [SuperuserController::class, 'setNumbersForTopics'])
    ->name('superuser.set-numbers-for-topics');*/

// Delete non-existent topics
Route::prefix('repair')->middleware(['role:superuser'])->group(function (){
    Route::get('delete-topics', [RepairController::class, 'fixTopicsDatabase'])->name('repair.delete-topics');
});

/* Students routes */
require_once 'lk-students.php';
/* Admins routes */
require_once 'admin.php';