<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

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
    return view('index', ['jobs_count' => Job::count()]);
});

Route::resource('jobs', JobController::class);
Route::resource('jobs.applications', ApplicationController::class)->except(['show']);

Route::resource('register', RegisterController::class)->only(['create','store']);

Route::get('/login', [LogController::class, 'show'])->middleware('guest');
Route::post('/login', [LogController::class, 'login'])->middleware('guest');
Route::post('/logout', [LogController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');
