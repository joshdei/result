<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Backdoor,
    SchoolOwnerController,
    SchoolTeacherController,
    ClassArmController,
    SubjectController,
    MarksController,
    ResultController,
};

// Public Routes
Route::get('/', [Backdoor::class, 'access'])->name('/');
Route::get('dashboard', [Backdoor::class, 'access'])->name('dashboard');
Route::get('/access', [Backdoor::class, 'access'])->name('access');
Route::get('tlogin', [Backdoor::class, 'tlogin'])->name('tlogin'); // Login form for teachers
Route::post('/teacher/login', [Backdoor::class, 'teacherLogin'])->name('teacherlogin');

// Routes accessible only by authenticated teachers

Route::group(['middleware' => 'auth:school_teacher'], function () {
    Route::get('/teacherindex', [SchoolTeacherController::class, 'teacherindex'])->name('teacherindex');
// Route to show the form to create a new student
Route::get('/student/create', [SchoolTeacherController::class, 'create'])->name('student.create');
Route::post('/students/{id}/update-scores', [ResultController::class, 'updateScores'])->name('student.updateScores');

Route::get('stordays', [SchoolTeacherController::class, 'stordays'])->name('stordays');
Route::post('/storedays', [SchoolTeacherController::class, 'storedays'])->name('storedays');
// Route to handle the form submission for creating a student
Route::post('/student/store', [SchoolTeacherController::class, 'store'])->name('student.store');
Route::get('/studentscores/{', [ResultController::class, 'studentscores'])->name('student.scores');
Route::get('result', [ResultController::class, 'result'])->name('result');
// Route to show the form to edit an existing student
Route::get('/student/{id}/edit', [SchoolTeacherController::class, 'edit'])->name('student.edit');
Route::get('/studentscores/{id}', [ResultController::class, 'studentscores'])->name('student.scores');
Route::get('/subject', [SchoolTeacherController::class, 'subject'])->name('subject');
Route::post('/student/save-remarks', [StudentController::class, 'saveRemarks'])->name('student.saveRemarks');

Route::post('/studentsaveDays', [SchoolTeacherController::class, 'studentsaveDays'])->name('student.saveDays');
Route::post('/students/skills', [ResultController::class, 'saveSkills'])->name('student.saveSkills');
Route::post('/student/save-behavior', [ResultController::class, 'saveBehavior'])->name('student.saveBehavior');
Route::post('/student/save-remarks', [ResultController::class, 'saveRemarks'])->name('student.saveRemarks');

Route::post('/savePrincipalremarks', [ResultController::class, 'savePrincipalremarks'])->name('savePrincipalremarks');
Route::get('/behavior', [ResultController::class, 'behavior'])->name('behavior');
Route::get('remark', [ResultController::class, 'remark'])->name('remark');
Route::get('remarksstudent', [ResultController::class, 'remarksstudent'])->name('remarksstudent');
Route::get('principalremarks', [ResultController::class, 'principalremarks'])->name('principalremarks');
Route::post('/store-scores', [App\Http\Controllers\ResultController::class, 'storeScores'])->name('store.scores');

Route::get('/studentresult{id}', [App\Http\Controllers\ResultController::class, 'studentresult'])->name('student.result');
// Route to update an existing student in the database
Route::put('/student/{id}', [SchoolTeacherController::class, 'update'])->name('student.update');

Route::get('studentdays', [ResultController::class, 'studentdays'])->name('studentdays');
Route::delete('/destroydays/{id}', [SchoolTeacherController::class, 'destroydays'])->name('destroydays');
// Route to delete a student from the database
Route::delete('/student/{id}', [SchoolTeacherController::class, 'destroy'])->name('student.destroy');

});


// Routes accessible only by authenticated school owners
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::middleware('role:school_owner')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::get('/terms', [SchoolOwnerController::class, 'terms'])->name('terms');
        Route::post('/storeterms', [SchoolOwnerController::class, 'storeterms'])->name('storeterms');
        Route::post('/resumptionstore', [SchoolOwnerController::class, 'resumptionstore'])->name('resumption.store');
        Route::delete('destroyterms/{id}', [SchoolOwnerController::class, 'destroyterms'])->name('destroyterms');
        Route::get('/termresumption', [SchoolOwnerController::class, 'termresumption'])->name('termresumption');
        Route::delete('destroyresumption/{id}', [SchoolOwnerController::class, 'destroyresumption'])->name('destroyResumption');
        Route::post('/resumptionstore', [SchoolOwnerController::class, 'resumptionstore'])->name('resumption.store');
        Route::post('/owner-of-school/complete', [SchoolOwnerController::class, 'ownerofschoolcomplete'])->name('ownerofschoolcomplete');
        Route::get('ownerdasboard', [SchoolOwnerController::class, 'ownerdasboard'])->name('ownerdasboard');
        Route::get('addteacher', [SchoolOwnerController::class, 'addteacher'])->name('add');
        Route::get('complete', [SchoolOwnerController::class, 'complete'])->name('complete');
        Route::post('/teachers', [SchoolOwnerController::class, 'storeteacher'])->name('teachers.store');
        Route::get('/teacher/{id}/edit', [SchoolOwnerController::class, 'edit'])->name('teacher.edit');
        Route::post('/teacher/{id}/update', [SchoolOwnerController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{id}', [SchoolOwnerController::class, 'destroy'])->name('teacher.destroy');
        Route::get('/addclass', [SchoolOwnerController::class, 'addclass'])->name('addclass');;
        Route::post('/owner/classes', [SchoolOwnerController::class, 'storeclass'])->name('classes.store');
        Route::get('viewteacher', [SchoolOwnerController::class, 'viewteacher'])->name('viewteacher');
        Route::get('/classes/{id}/edit', [SchoolOwnerController::class, 'editteacher'])->name('classes.edit');
        Route::delete('/classes/{id}', [SchoolOwnerController::class, 'destroyteacher'])->name('classes.destroy');
        Route::get('/addarm', [SchoolOwnerController::class, 'addarm'])->name('addarm');
        Route::post('classarms', [ClassArmController::class, 'storearm'])->name('classarms.store');
        Route::delete('classarms/{id}', [ClassArmController::class, 'destroy'])->name('classarms.destroy');
        Route::get('viewarm', [ClassArmController::class, 'viewarm'])->name('viewarm');
        Route::delete('deletearm/{id}', [ClassArmController::class, 'deletearm'])->name('delete.arm');
        Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('/classes/{class_id}', [SchoolOwnerController::class, 'viewClassSubjects'])->name('viewclasubjects');
        Route::get('viewsubject', [SchoolOwnerController::class, 'viewsubject'])->name('viewsubject');
        Route::get('addsubject', [SchoolOwnerController::class, 'addsubject'])->name('addsubject');
        Route::get('viewscorespoint', [MarksController::class, 'viewscorespoint'])->name('viewscorespoint');
        Route::delete('marksdestroy/{id}', [MarksController::class, 'marksdestroy'])->name('marksdestroy');
        Route::post('/marks/store', [MarksController::class, 'store'])->name('marks.store');
        Route::delete('subjectdestroy/{id}', [SchoolOwnerController::class, 'subjectdestroy'])->name('subject.destroy');
        Route::get('addscorespoint', [SchoolOwnerController::class, 'addscorespoint'])->name('addscorespoint');
        Route::get('termsession', [SchoolOwnerController::class, 'termsession'])->name('termsession');
        Route::post('termstore', [SchoolOwnerController::class, 'termstore'])->name('term.store');
         Route::delete('destroyterm/{id}', [SchoolOwnerController::class, 'destroyterm'])->name('destroyterm');
        
    });

    // Logout Route
    Route::post('logout', [Backdoor::class, 'logout'])->name('logout');
});
