<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () { return view('welcome'); });

//  Student login aur register kr rhe hai----------
Route::get('/student',[StudentController::class,'show'])->name('student');
Route::post('/student',[StudentController::class,'insert'])->name('student');
Route::get('/login',[StudentController::class,'showlogin'])->name('login');
Route::post('/login',[StudentController::class,'login'])->name('loginpage');
Route::get('/logout', [StudentController::class, 'logout'])->name('logout');

//  Dashboard ka process kr rhe hai----------
Route::get('/admindash',[StudentController::class,'admindash'])->Middleware(AuthMiddleware::class)->name('admindash');
Route::get('/userdash',[StudentController::class,'userdash'])->Middleware(AuthMiddleware::class)->name('userdash');

//  Subject ka process ho rha hai
Route::get('/subject/add', [AdminController::class, 'show'])->name('subject.add');
Route::post('/subject/insert', [AdminController::class, 'insertdata'])->name('subject.insert');
Route::get('/subject/list', [AdminController::class, 'list'])->name('subject.list');
Route::get('/subject/edit/{id}', [AdminController::class, 'edit'])->name('subject.edit');
Route::post('/subject/update/{id}', [AdminController::class, 'updatedata'])->name('subject.update');
Route::get('/subject/delete/{id}', [AdminController::class, 'delete'])->name('subject.delete');

// exam controller ka process kr rhe hai----------
Route::get('/exam/add', [ExamController::class, 'create'])->name('exam.create');
Route::post('/exam/store', [ExamController::class, 'store'])->name('exam.store');


Route::get('/question/create', [QuestionController::class, 'create'])->name('question.create');
Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');



Route::get('/get-questions/{id}', [ExamController::class, 'getQuestions']);
Route::post('/exam/store', [ExamController::class, 'store'])->name('exam.store');

Route::post('/exam/store', [ExamController::class, 'store'])->name('exam.store');


// Route::get('/userdash',[UserController::class,'userdata'])->Middleware(AuthMiddleware::class);
Route::get('/userdash',[UserController::class,'userdata'])->Middleware(AuthMiddleware::class);
Route::get('/questionpaper',[UserController::class,'showquestion']);


Route::get('/questionpaper', [ExamController::class, 'questionPaper'])->name('question.paper');
Route::post('/submit-exam', [ExamController::class, 'submitExam'])->name('submit.exam');


// Route::get('/userdash', [ExamController::class, 'showresult'])->name('userdash');









// Exam List Page
Route::get('/exam-list', [ExamController::class, 'examList'])->name('exam.list');

// Load selected Exam Questions
Route::get('/exam/{id}/questions', [ExamController::class, 'examQuestions'])->name('exam.questions');

// Delete question from exam
Route::get('/exam/{examId}/question/{questionId}/delete', [ExamController::class, 'deleteExamQuestion'])->name('exam.question.delete');


Route::get('/exam/{id}/questions', [ExamController::class, 'examQuestions'])->name('exam.questions');

// Delete Question From Exam
Route::get('/exam/{examId}/question/{questionId}/delete', [ExamController::class, 'deleteExamQuestion'])->name('exam.question.delete');


Route::get('/result', [ExamController::class, 'result'])->name('result');



// Route::get('/result/{id}', [ExamController::class, 'result'])->name('result');
