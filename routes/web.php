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
Route::get('/contact', 'ContactController@get')->name('site.contact');
Route::post('/contact', 'ContactController@saveContactMessage')->name('site.contact.save');
Route::get('/portfolio', 'PortfolioController@get')->name('site.portfolio');
Route::get('/portfolio/{slug}', 'PortfolioController@getPortfolioItemBySlug')->name('site.portfolio.item');

// Admin routes
Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@get')->name('home');
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

    Route::get('/contact', 'ContactMessageController@get')->name('contact');
    Route::delete('/contact/{id}', 'ContactMessageController@deleteMessage')->name('contact.delete');

    Route::get('/portfolio', 'PortfolioController@get')->name('portfolio');
    Route::post('/portfolio', 'PortfolioController@save')->name('portfolio.save');
    Route::get('/portfolio/edit/{id}', 'PortfolioController@edit')->name('portfolio.item');
    Route::post('/portfolio/edit/{id}', 'PortfolioController@update')->name('portfolio.edit');
    Route::delete('/portfolio/delete/{id}', 'PortfolioController@deleteItem')->name('portfolio.delete');
    Route::delete('/portfolio/edit/{id}/deleteScreenshot/{screenshotId}', 'PortfolioController@deleteScreenshot')->name('portfolio.deleteScreenshot');
});
