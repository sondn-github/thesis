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

Route::middleware(['auth'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/lessons/create', 'LessonsController@create')->name('lesson.create');
    Route::post('/lessons', 'LessonsController@store')->name('lesson.store');
    Route::get('/lessons', 'LessonsController@index')->name('lesson.index');
    Route::get('/datatables/lessons', 'DatatableController@lessons')->name('datatables.lessons');
    Route::get('/lessons/{id}', 'LessonsController@getLessonOfTeacher')->name('lesson.getLessonOfTeacher');
    Route::get('/lessons/{id}/edit', 'LessonsController@edit')->name('lesson.edit');
    Route::put('/lessons/{id}', 'LessonsController@update')->name('lesson.update');
    Route::get('/status/change', 'LessonsController@changeStatus')->name('lesson.status.change');
    Route::delete('/lessons/{id}', 'LessonsController@destroy')->name('lesson.destroy');
    Route::get('/advises', 'KnowledgeController@getAdvises')->name('lesson.advises');
});

Route::get('/test', 'KnowledgeController@getAdvises');
