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

Route::post('/updateDifficulty', [UpdateQuestionDifficulty::class, 'handle']);

Route::group(['prefix' => '/test'], function () {
    Route::put('/create', [TestController::class, 'create'])->middleware('authChecked');
    Route::put('/edit', [TestController::class, 'edit'])->middleware('authChecked');
    Route::post('/solved/save', [TestController::class, 'saveSolvedTest']);
});

Route::group(['prefix' => 'quest'], function () {
    Route::post('/generate', [ComponentController::class, 'reGenerate']);
    Route::post('/create', [ComponentController::class, 'create']);
});

Route::group(['prefix' => '/auth'], function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
});
