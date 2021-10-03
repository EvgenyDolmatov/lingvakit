<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConformityController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MediaFileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\QuestionOptionController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\Students\StudentCourseController;
use App\Http\Controllers\Admin\Teachers\TeacherController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\System\RepairController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserResultController;
use App\Http\Controllers\UserTopicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index'])->name('site.index');
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

/* Students */
Route::middleware(['auth', 'locale', 'verified'])->group(function (){
    // Profile Update
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.show');
    Route::put('/profile/user-update', [UserController::class, 'infoUpdate'])->name('user-info.update');
    Route::put('/profile/user-password-update', [UserController::class, 'passwordUpdate'])->name('user-password.update');
    // Settings of site
    Route::get('/settings', [SettingController::class, 'studentShow'])->name('user-settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('user-settings.update');


    Route::get('my-courses', [SiteController::class, 'myCourses'])->name('site.my-courses');

    Route::prefix('courses/course-{course}')->group(function (){

        Route::post('get-course', [SiteController::class, 'getCourse'])->name('site.get-course');

        /* Topics */
        Route::prefix('topic-{topic}')->group(function (){

            Route::get('/', [UserTopicController::class, 'showTopic'])->name('site.show-topic');
            /* Lessons */
            Route::prefix('lesson-{lesson}')->group(function (){
//                Route::get('/', [UserTopicController::class, 'showLesson'])->name('site.lesson-show');
                Route::post('/', [UserTopicController::class, 'passed'])->name('site.lesson-passed');
            });
            /* Quizzes */
            Route::prefix('quiz-{quiz}')->group(function (){
//                Route::get('/', [UserTopicController::class, 'showQuiz'])->name('site.quiz-show');
                Route::post('leave-comment', [UserTopicController::class, 'leaveComment'])->name('site.quiz.leave-comment');
                Route::get('testing', [UserTopicController::class, 'testing'])->name('site.testing');
                Route::post('result', [UserResultController::class, 'store'])->name('site.store-results');
                /* Work on Bugs */
                Route::get('bug-work', [UserTopicController::class, 'bugWork'])->name('bug-work.show');
            });
        });

        /* ORDERING */
        /* Checkout */
//        Route::get('cart', [OrderController::class, 'shoppingCart'])->name('orders.cart');
        Route::get('checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
        Route::post('checkout', [OrderController::class, 'storeOrder'])->name('orders.store');
        Route::get('order-noty', [OrderController::class, 'notification'])->name('orders.noty');
    });

    Route::get('payment-info', [OrderController::class, 'paymentResult'])->name('orders.payment-info');
});

/* TEACHER'S DASHBOARD */
/*Route::middleware(['auth', 'verified', 'locale', 'role:teacher'])->group(function (){
    Route::get('teacher-panel', [CourseController::class, 'index'])->name('teacher.panel');
});*/

/* AJAX */
Route::get('ajax/files/{fileType}', [MediaFileController::class, 'getFilesByAjax'])->name('ajax.get-files');
Route::get('ajax/promo/{code}', [PromocodeController::class, 'getPromoCodeData'])->name('ajax.get-promo-code');

/* Admin */
Route::prefix('dashboard')->middleware(['auth', 'locale', 'role:superuser|admin|teacher'])->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('media', MediaFileController::class);
    Route::get('media/download/file-{file}', [MediaFileController::class, 'downloadFile'])->name('media.download');
    Route::post('media/upload', [MediaFileController::class, 'ajaxStore'])->name('media.store-ajax');
    Route::get('media/{id}/get-data', [MediaFileController::class, 'getAjaxData'])->name('media.ajax.get-data');

    Route::get('files/download/file-{file}', [StudentCourseController::class, 'downloadFile'])->name('files.download');

    /* ROLES & PERMISSIONS */
    Route::resource('roles', RoleController::class)->middleware('role:superuser');
    Route::resource('permissions', PermissionController::class)->middleware('role:superuser');

    /* CATEGORIES */
    Route::resource('categories', CategoryController::class)->middleware(['role:superuser|admin']);

    /* LANGUAGES */
    Route::resource('languages', LanguageController::class)->middleware(['role:superuser|admin']);

    /* COURSES */
    Route::resource('courses', CourseController::class);

    /* Update index of topic */
    Route::put('topic/{topic}/index', [TopicController::class, 'updateIndex'])->name('topic.index');

    /* Show All of Courses */
    Route::get('all-courses', [CourseController::class, 'allCourses'])->middleware(['role:superuser|admin'])->name('courses.all');

    Route::prefix('courses/{course}')->group(function (){
        /* Remove Course  Media Files */
        Route::put('image-remove', [CourseController::class, 'removeImage'])->name('courses.image.remove');
        Route::put('video-remove', [CourseController::class, 'removeVideo'])->name('courses.video.remove');

        /* Stages CRUD */
        Route::post('stages/create', [StageController::class, 'store'])->name('stages.store');
        Route::put('stages/{stage}/edit', [StageController::class, 'update'])->name('stages.update');
        Route::delete('stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');

        Route::prefix('stage-{stage}')->group(function (){
            /* Lessons */
            Route::resource('lessons', LessonController::class);
            Route::prefix('lessons/{lesson}')->group(function (){
                /* Remove Lesson Media Files */
                Route::put('audio-remove', [LessonController::class, 'removeAudio'])->name('lessons.audio.remove');
                Route::put('image-remove', [LessonController::class, 'removeImage'])->name('lessons.image.remove');
                Route::put('video-remove', [LessonController::class, 'removeVideo'])->name('lessons.video.remove');
                Route::put('file-remove/{file}', [LessonController::class, 'removeFile'])->name('lessons.file.remove');
            });

            Route::resource('quizzes', QuizController::class); // Quizzes
            Route::prefix('quizzes/{quiz}')->group(function (){

                /* Remove Quiz Media Files */
                Route::put('audio-remove', [QuizController::class, 'removeAudio'])->name('quizzes.audio.remove');
                Route::put('image-remove', [QuizController::class, 'removeImage'])->name('quizzes.image.remove');
                Route::put('video-remove', [QuizController::class, 'removeVideo'])->name('quizzes.video.remove');

                Route::prefix('questions')->group(function () {

                    /* Question CRUD */
                    Route::get('{questionType}/create', [QuestionController::class, 'create'])->name('questions.create');
                    Route::post('{questionType}/create', [QuestionController::class, 'store'])->name('questions.store');
                    Route::get('{question}', [QuestionController::class, 'show'])->name('questions.show');
                    Route::get('{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
                    Route::put('{question}/edit', [QuestionController::class, 'update'])->name('questions.update');
                    Route::delete('{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

                    Route::prefix('{question}')->group(function () {

                        /* Conformity CRUD */
                        Route::prefix('conformity')->group(function (){
                            Route::get('create', [ConformityController::class, 'create'])->name('conformity.create');
                            Route::post('create', [ConformityController::class, 'store'])->name('conformity.store');
                            Route::get('{conformity}/edit', [ConformityController::class, 'edit'])->name('conformity.edit');
                            Route::put('{conformity}/edit', [ConformityController::class, 'update'])->name('conformity.update');
                            Route::delete('{conformity}', [ConformityController::class, 'destroy'])->name('conformity.destroy');

                            Route::prefix('{conformity}')->group(function (){
                                /* Remove Conformity Image & Audio */
                                Route::put('audio-remove', [ConformityController::class, 'removeAudio'])->name('conformity.audio.remove');
                                Route::put('image-remove', [ConformityController::class, 'removeImage'])->name('conformity.image.remove');
                            });
                        });

                        /* Remove Question Image & Audio */
                        Route::delete('audio-{audio}/remove', [QuestionController::class, 'removeAudio'])->name('questions.audio.remove');
                        Route::put('image-remove', [QuestionController::class, 'removeImage'])->name('questions.image.remove');

                        /* Changing the correct option */
                        Route::put('options/{option}/change', [QuestionOptionController::class, 'changeIsCorrect'])->name('options.change-is-correct');
                    });
                });
            });
        });

        /* Students on the Course */
        Route::get('students', [StudentCourseController::class, 'studentsList'])->name('course.students.list');
    });

    /* PROMO CODES */
    Route::resource('promocodes', PromocodeController::class);

    /* STUDENTS */
    Route::prefix('students')->group(function (){
        Route::get('/', [StudentController::class, 'index'])->name('students.index');
        Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');
        Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/{student}/edit', [StudentController::class, 'update'])->name('students.update');

        Route::prefix('{student}')->group(function (){
            Route::get('add-course', [StudentCourseController::class, 'addCourse'])->name('students.course.add');
            Route::post('give-course-{course}', [StudentCourseController::class, 'giveAccessToCourse'])->name('students.course.give-access');
            Route::get('course/{course}', [StudentCourseController::class, 'show'])->name('students.course.show');
            Route::get('course/{course}/quiz/{quiz}/answers', [StudentCourseController::class, 'showAnswers'])->name('students.course.answers.show');

            Route::put('quiz-{quiz}/conformity-{conformity}', [StudentCourseController::class, 'acceptQuestion'])->name('students.accept-answer');
        });
    });

    /* GROUPS */
    Route::resource('groups', GroupController::class);
    Route::get('groups/{group}/students', [GroupController::class, 'studentsList'])->name('group.students-list');
    Route::post('groups/{group}/set-students', [GroupController::class, 'setStudentsList'])->name('group.set-students-list');
    Route::delete('groups/{group}/{student}/exclude', [GroupController::class, 'excludeStudent'])->name('group.student.exclude');

    /* TEACHERS */
    Route::prefix('teachers')->middleware(['role:superuser|admin'])->group(function (){
        Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teacher-{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
        Route::get('/new-courses', [TeacherController::class, 'coursesForModeration'])->name('courses.moderation');
        Route::put('/new-courses/course-{course}/moderate', [TeacherController::class, 'courseModerateSwitcher'])->name('courses.moderate-switcher');
    });

    /* ALL USERS */
    Route::prefix('users')->middleware(['role:superuser|admin'])->group(function (){
        Route::get('/', [UserController::class, 'adminUsersList'])->name('admin.users.index');
        Route::get('/{user}', [UserController::class, 'adminUserShow'])->name('admin.users.show');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    /* Actions with Users */
    Route::put('users/user-{user}/block', [UserController::class, 'banSwitcher'])->name('users.ban-switcher');
    Route::post('users/user-{user}/give-teacher-role', [UserController::class, 'giveTeacherRole'])->name('users.give-teacher-role');
});

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
