<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/propose', 'HomeController@propose');
Route::get('/booth/{route}', 'HomeController@index');
Route::get('/my_ip', 'HomeController@myIpAddress');
Route::get('/lang/{language}', 'LanguageController@switchLanguage');
Route::redirect('/es', '/lang/es/?home', 301);
Route::redirect('/en', '/lang/en/?home', 301);

Auth::routes();

/* Archive */
Route::get('/archive/2017', 'ArchiveController@archive2017');
Route::get('/archive/{edition}', 'ArchiveController@results');
Route::get('/archive/{edition}/about', 'ArchiveController@about');

/* Ballot lookup */
Route::get('/ballot/lookup', 'BallotController@ballotLookUp');
Route::get('/ballot/{ballotRef}', 'BallotController@ballot');

/* Admin */
Route::get('/admin', 'AdminController@index')->middleware('auth');

/* Force SSL */
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}
