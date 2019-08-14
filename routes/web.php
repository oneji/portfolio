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

Auth::routes();
// Web-site routes
Route::get('/', 'ResumeController@getResume')->name('site.resume');
Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::prefix('admina')->namespace('Admin')->middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@get');
    Route::get('/about', 'AboutController@get')->name('admin.about');
    Route::post('/about', 'AboutController@save')->name('admin.about.save');

    Route::get('/education', 'EducationController@get')->name('admin.education');
    Route::post('/education', 'EducationController@save')->name('admin.education.save');
    Route::delete('/education/{id}', 'EducationController@delete')->name('admin.education.delete');

    Route::get('/experience', 'ExperiencesController@get')->name('admin.experience');
    Route::post('/experience', 'ExperiencesController@save')->name('admin.experience.save');
    Route::delete('/experience/{id}', 'ExperiencesController@delete')->name('admin.experience.delete');

    Route::get('/skills', 'SkillController@get')->name('admin.skills');
    Route::post('/skills', 'SkillController@save')->name('admin.skills.save');
    Route::delete('/skills/{id}', 'SkillController@delete')->name('admin.skills.delete');

    Route::post('/cv', 'AboutController@uploadCV')->name('admin.cv.upload');
    Route::get('/cv', 'AboutController@downloadCV')->name('admin.cv.download');

});
