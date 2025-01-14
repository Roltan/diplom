<?php

use App\Http\Controllers\QuestController;
use App\Http\Controllers\SolvedTestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/test'], function () {
    Route::get('/solve/{alias}', [TestController::class, 'getTest']);
    Route::post('/generate', [TestController::class, 'generateTest']);
    Route::put('/create', [TestController::class, 'create'])->middleware('authChecked');
    Route::delete('/delete/{id}', [TestController::class, 'delete'])->middleware('authChecked');

    Route::group(['prefix' => '/solved'], function () {
        Route::post('/save', [SolvedTestController::class, 'saveSolvedTest']);
        Route::get('/my/{testId}', [SolvedTestController::class, 'getMySolvedTest'])->middleware('authChecked');
        Route::get('/{solvedId}', [SolvedTestController::class, 'getSolvedTest']);
    });
});

Route::group(['prefix' => '/quest'], function () {
    Route::post('/generate', [QuestController::class, 'reGenerate']);
    Route::put('/create', [QuestController::class, 'create']);
});

Route::group(['prefix' => '/auth'], function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
});
