<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LogoutController;
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

Route::get('/appForm', function () {
    return view('applicationFormPage');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/employer', [EmployerController::class, 'create'])->middleware('guest');
Route::post('/employer', [EmployerController::class, 'store'])->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout']);
