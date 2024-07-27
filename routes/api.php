<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\httpRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;

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

Route::get('httpRequest',[httpRequestController::class, 'show']);
Route::get('lastUser',[UserController::class, 'lastUser']);
Route::get('sortByName',[UserController::class, 'sortByName']);
Route::get('totalSum',[UserController::class, 'totalSum']);
Route::get('userPeriod',[UserController::class, 'userPeriod']);
Route::get('userLike',[UserController::class, 'userLike']);
Route::get('activeAgent',[AgentController::class, 'activeAgent']);
Route::get('userByCity',[UserController::class, 'userByCity']);
Route::get('userByWallet',[UserController::class, 'userByWallet']);
