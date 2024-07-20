<?php

use App\Http\Controllers\DailyCoController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', [DailyCoController::class, 'createRoom']);
//Route::get('/join-room/{name}', [DailyCoController::class, 'joinRoom']);


Route::get('/', [DailyCoController::class, 'createRoom']);
Route::get('/join-room/{name}/{grade}', [DailyCoController::class, 'joinRoom'])
    ->middleware('check.grade:grade');









