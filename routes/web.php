<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('initial');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dash'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Auth::routes();

Route::get('/testMail/{id}', [App\Http\Controllers\HomeController::class, 'sendTestMail']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');
Route::post('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
