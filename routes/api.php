<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\BallotController;
use App\Http\Controllers\API\BoothController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded with the "api" middleware group and the "/api"
| prefix (see bootstrap/app.php).
|
*/

/* Booth functionality */
Route::post('/precheck', [BoothController::class, 'precheck']);
Route::post('/request_sms', [BoothController::class, 'requestSms']);
Route::post('/cast_ballot', [BoothController::class, 'castBallot']);

/* Front page blocks */
Route::get('/sidebar', [HomeController::class, 'sidebar']);
Route::get('/option/{option}', [HomeController::class, 'option']);

/* Ballot helpers */
Route::get('/ballot', [BallotController::class, 'ballotJSON']);
Route::get('/ballot/qr/{ref}', [BallotController::class, 'ballotQR']);

/* Admin area */
Route::post('/annul_ballot', [AdminController::class, 'annulBallot'])->middleware('auth:api');
Route::post('/id_lookup', [AdminController::class, 'lookUp'])->middleware('auth:api');
Route::post('/unblock', [AdminController::class, 'unblock'])->middleware('auth:api');
Route::get('/results', [AdminController::class, 'results'])->middleware('auth:api');
Route::get('/reports', [AdminController::class, 'reports'])->middleware('auth:api');

/* News */
Route::get('/stories', [NewsController::class, 'index']);
