<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BallotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/participa', [HomeController::class, 'participa']);
Route::get('/projects', [HomeController::class, 'projects']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/propose', [HomeController::class, 'propose']);
Route::get('/participa/booth/{route}', [HomeController::class, 'participa']);
Route::get('/my_ip', [HomeController::class, 'myIpAddress']);
Route::get('/legal', [HomeController::class, 'legal']);
Route::get('/lang/{language}', [LanguageController::class, 'switchLanguage']);
Route::redirect('/es', '/lang/es/?home', 301);
Route::redirect('/en', '/lang/en/?home', 301);

// Sections
Route::view('/associacions/{assoc?}', 'associations');
Route::view('/altea-decideix', 'altea_decideix');
Route::view('/activitats', 'activities');
Route::view('/documents', 'docs');

Auth::routes();

/* Archive */
Route::get('/archive/2017', [ArchiveController::class, 'archive2017']);
Route::get('/archive/{edition}', [ArchiveController::class, 'results']);
Route::get('/archive/{edition}/about', [ArchiveController::class, 'about']);

/* Ballot lookup */
Route::get('/ballot/lookup', [BallotController::class, 'ballotLookUp']);
Route::get('/ballot/{ballotRef}', [BallotController::class, 'ballot']);

/* Admin */
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

/* Pages */
Route::view('{any}', 'pages')->where('any', '.*');
