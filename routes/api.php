<?php

use App\Console\Commands\UpdateQuestionDifficulty;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComponentController;
use App\Services\DifficultyServices;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::post('/updateDifficulty', [UpdateQuestionDifficulty::class, 'handle']);

Route::group(['prefix' => '/test'], function () {
    Route::put('/create', [TestController::class, 'create']);
    Route::put('/edit', [TestController::class, 'edit']);
    Route::post('/solved/save', [TestController::class, 'saveSolvedTest']);
    Route::get('/advise', [ComponentController::class, 'advise']);
});

Route::group(['prefix' => '/quest'], function () {
    Route::post('/generate', [ComponentController::class, 'reGenerate']);
    Route::post('/create', [ComponentController::class, 'create']);
});

Route::group(['prefix' => '/auth'], function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/forgot', [UserController::class, 'forgot']);
    Route::post('/changePassword', [UserController::class, 'changePassword']);
    Route::post('/edit', [UserController::class, 'edit']);
});
