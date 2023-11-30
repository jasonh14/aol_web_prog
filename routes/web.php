<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name("dashboard");

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat/{id}', [ChatbotController::class, 'chat'])->name("chat");
Route::get('/explore', [App\Http\Controllers\ChatbotController::class, 'index'])->name('explore');
Route::get('/upload', [App\Http\Controllers\ChatbotController::class, 'upload'])->name('upload');
Route::post('/processUpload', [App\Http\Controllers\ChatbotController::class, 'processUpload'])->name('processUpload');
