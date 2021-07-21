<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserProfilesController;
use \App\Http\Controllers\CodeGeneratorController;
use \App\Http\Controllers\MovieController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-profiles',[UserProfilesController::class,'index']);
Route::post('/user-profiles/store',[UserProfilesController::class,'store']);

Route::get('/code-generate',[CodeGeneratorController::class, 'index']);
Route::get('/code-generate/show',[CodeGeneratorController::class, 'showCode'])->name('code.list');
Route::get('/code-generate/show/{id}',[CodeGeneratorController::class, 'showDetailCode']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/movie',[MovieController::class,'index'])->name('movie');
    Route::get('/movie/detail/{id}',[MovieController::class,'detailMovie'])->name('movie.detail');
});
