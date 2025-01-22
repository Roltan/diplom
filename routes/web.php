<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'viewIndex']);

Route::group(['prefix' => '/profile'], function () {
    Route::get('/', [ProfileController::class, 'viewProfile']);
    Route::get('/create', [ProfileController::class, 'viewCreate']);
    Route::get('/solved', [ProfileController::class, 'viewSolved']);
    Route::get('/statistic', [ProfileController::class, 'viewStatistic']);
    Route::get('/test', [ProfileController::class, 'viewTests']);
});

Route::group(['prefix' => '/solved'], function () {
    Route::get('/my/{testId}', [TestPageController::class, 'viewMySolvedTest']);
    Route::get('/{solvedId}', [TestPageController::class, 'viewSolvedTest']);
});

Route::group(['prefix' => '/test'], function () {
    Route::get('/{alias}', [TestPageController::class, 'viewTest']);
    Route::get('/edit/{alias}', [TestPageController::class, 'viewTestSettings']);
    Route::post('/generate', [TestPageController::class, 'generateTest']);
});


Route::group(['prefix' => 'quest'], function () {
    Route::post('/generate', [ComponentController::class, 'reGenerate']);
    Route::post('/create', [ComponentController::class, 'create']);
});

Route::get('/logout', [UserController::class, 'logout']);
