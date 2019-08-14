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
Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@get');
    Route::get('/about', 'AboutController@get')->name('about');
    Route::post('/about', 'AboutController@save')->name('about.save');

    Route::get('/education', 'EducationController@get')->name('education');
    Route::post('/education', 'EducationController@save')->name('education.save');
    Route::delete('/education/{id}', 'EducationController@delete')->name('education.delete');

    Route::get('/experience', 'ExperiencesController@get')->name('experience');
    Route::post('/experience', 'ExperiencesController@save')->name('experience.save');
    Route::delete('/experience/{id}', 'ExperiencesController@delete')->name('experience.delete');

    Route::get('/skills', 'SkillController@get')->name('skills');
    Route::post('/skills', 'SkillController@save')->name('skills.save');
    Route::delete('/skills/{id}', 'SkillController@delete')->name('skills.delete');

    Route::post('/cv', 'AboutController@uploadCV')->name('cv.upload');
    Route::get('/cv', 'AboutController@downloadCV')->name('cv.download');

});
