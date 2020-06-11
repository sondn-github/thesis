<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WebController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lesson/{id}', 'LessonsController@getLessonDetail')->name('lesson-single');
Route::get('language/{lang}', 'WebController@changeLanguage')->name('language');
Route::get('/lessons', 'LessonsController@getLessons')->name('lessons');
Route::get('/display-lesson/{id}', 'LessonsController@displayLesson')->name('display-lesson')->middleware('auth');

Route::post('/evaluation', 'EvaluationController@store')->name('evaluation-store')->middleware('auth');
Route::get('/profile', 'ProfileController@get')->name('profile.get');
Route::post('/profile', 'ProfileController@update')->name('profile.update');
Route::post('/change-password', 'ProfileController@changePassword')->name('profile.change-password');
Route::post('/change-avatar', 'ProfileController@changeAvatar')->name('profile.change-avatar');
//Route::get('/search', 'LessonsController@searchLesson')->name('lesson.search');

Route::middleware(['auth', 'isTeacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/lessons/create', 'LessonsController@create')->name('lessons.create');
    Route::post('/lessons', 'LessonsController@store')->name('lesson.store');
    Route::get('/lessons', 'LessonsController@index')->name('lesson.index');
    Route::get('/datatables/lessons', 'DatatableController@lessons')->name('datatables.lessons');
    Route::get('/lessons/{id}', 'LessonsController@getLessonOfTeacher')->name('lesson.getLessonOfTeacher');
    Route::get('/lessons/{id}/edit', 'LessonsController@edit')->name('lesson.edit');
    Route::put('/lessons/{id}', 'LessonsController@update')->name('lesson.update');
    Route::get('/status/change', 'LessonsController@changeStatus')->name('lesson.status.change');
    Route::delete('/lessons/{id}', 'LessonsController@destroy')->name('lesson.destroy');
    Route::get('/advises', 'KnowledgeController@getAdvises')->name('courses.advises');
    Route::resource('courses', 'Teacher\CourseController');
    Route::get('/datatables/courses', 'DatatableController@courses')->name('datatables.courses');
});

Route::resource('courses', 'CourseController');
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController')->only(['show', 'index']);

Route::middleware(['auth', 'isExpert'])->prefix('expert')->name('expert.')->group(function () {
    Route::get('/datatables/criteria', 'DatatableController@criteria')->name('datatables.criteria');
    Route::resource('criteria', 'Expert\CriteriaController')->except(['destroy']);
    Route::get('/criteria-status/change', 'Expert\CriteriaController@changeStatus')->name('criteria.changing-status');
    Route::resource('facts', 'Expert\FactController')->except(['destroy', 'show']);
    Route::get('/datatables/facts', 'DatatableController@facts')->name('datatables.facts');
    Route::get('/fact-status/change', 'Expert\FactController@changeStatus')->name('facts.changing-status');
    Route::resource('knowledge', 'Expert\KnowledgeController')->except(['destroy', 'show']);
    Route::get('/datatables/rulesType1', 'DatatableController@rulesType1')->name('datatables.knowledge.rulesType1');
    Route::get('/datatables/rulesType2', 'DatatableController@rulesType2')->name('datatables.knowledge.rulesType2');
    Route::get('/rule-status/change', 'Expert\KnowledgeController@changeStatus')->name('knowledge.changing-status');
    Route::resource('rulesType2', 'Expert\RuleType2Controller')->except(['destroy', 'show']);
});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', 'Admin\HomeController@home')->name('home');

    Route::resource('criteria', 'Admin\CriteriaController')->except(['destroy']);
    Route::get('/datatables/criteria', 'DatatableController@criteria')->name('datatables.criteria');
    Route::get('/criteria-status/change', 'Admin\CriteriaController@changeStatus')->name('criteria.changing-status');
    Route::get('/criteria-type/change', 'Admin\TypeController@changeType')->name('criteria.changing-type');

    Route::resource('facts', 'Admin\FactController')->except(['destroy', 'show']);
    Route::get('/datatables/facts', 'DatatableController@facts')->name('datatables.facts');
    Route::get('/fact-status/change', 'Admin\FactController@changeStatus')->name('facts.changing-status');

    Route::resource('rulesType1', 'Admin\RuleType1Controller')->except(['destroy', 'show']);
    Route::get('/datatables/rulesType1', 'DatatableController@rulesType1')->name('datatables.knowledge.rulesType1');
    Route::get('/ruleType1-status/change', 'Admin\RuleType1Controller@changeStatus')->name('ruleType1.changing-status');

    Route::resource('rulesType2', 'Admin\RuleType2Controller')->except(['destroy', 'show']);
    Route::get('/datatables/rulesType2', 'DatatableController@rulesType2')->name('datatables.knowledge.rulesType2');
    Route::get('/ruleType2-status/change', 'Admin\RuleType2Controller@changeStatus')->name('ruleType2.changing-status');

    Route::resource('courses', 'Admin\CourseController')->except(['create, store']);
    Route::get('/datatables/courses', 'DatatableController@courses')->name('datatables.courses');

    Route::get('/datatables/lessons', 'DatatableController@lessons')->name('datatables.lessons');
    Route::get('/lesson-status/change', 'Admin\LessonController@changeStatus')->name('lessons.status.change');
    Route::resource('lessons', 'Admin\LessonController')->except(['create, store']);

    Route::get('/datatables/users', 'DatatableController@users')->name('datatables.users');
    Route::get('/user-status/change', 'Admin\UserController@changeStatus')->name('users.status.change');
    Route::resource('users', 'Admin\UserController');

    Route::get('/datatables/categories', 'DatatableController@categories')->name('datatables.categories');
    Route::resource('categories', 'Admin\CategoryController')->except(['show']);

    Route::resource('reports', 'Admin\ReportController')->except(['destroy']);
    Route::get('/exports', 'Admin\ReportController@exportTotalEvaluation')->name('exports.index');
    Route::get('/exports/{criteria_type}', 'Admin\ReportController@exportDetailEvaluationByCriteria')->name('exports.show');

    Route::get('/datatables/posts', 'DatatableController@posts')->name('datatables.posts');
    Route::resource('posts', 'Admin\PostController');

    Route::resource('details', 'Admin\ReportDetailController');
});

Route::get('/test', 'EvaluationController@test');
