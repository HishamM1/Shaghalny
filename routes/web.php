<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
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
    return view('mainPage', ['jobscount' => Job::count()]);
});

Route::get('/jobs', [JobController::class, 'search']);
Route::get('/job/{job}', [JobController::class, 'show']);

Route::get('/employer', [EmployerController::class, 'create'])->middleware('guest');
Route::post('/employer', [EmployerController::class, 'store'])->middleware('guest');

Route::get('/login', [LogController::class, 'view'])->middleware('guest');
Route::post('/login', [LogController::class, 'login'])->middleware('guest');
Route::get('/logout', [LogController::class, 'logout'])->middleware('auth');

Route::get('/appForm/{job}', [ApplicationController::class, 'show'])->middleware('guest');
Route::post('/storeApplication', [ApplicationController::class, 'storeApplication'])->middleware('guest');

Route::get('/dashboard/{company}', [DashboardController::class, 'show'])->middleware('auth')->name('dashboard');
Route::get('/dashboard/delete/{job}', [DashboardController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/applications/{job}', [DashboardController::class, 'jobApplications']);
Route::get('/dashboard/applications/delete/{application}', [DashboardController::class, 'deleteApplication'])->middleware('auth');
Route::get('/dashboard/add/{company}', [DashboardController::class, 'addJob'])->middleware('auth');
Route::post('/storeJob', [DashboardController::class, 'store'])->middleware('auth');
Route::get('/dashboard/update/{job}', [DashboardController::class, 'showupdateJob'])->middleware('auth');
Route::post('/updateJob/{job}', [DashboardController::class, 'update'])->middleware('auth');
