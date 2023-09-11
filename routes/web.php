<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//User and Admin View Route
Route::view('/patient','user.home');
Route::get('/administrator',[AuthController::class,'admin']);

Route::get('/user',[AuthController::class,'verify']);

//Admin Routes
Route::get('/view-doctor',[AdminController::class,'viewDoctor'])->name('admin.doctor.view');
Route::post('/add-doctor',[AdminController::class,'addDoctor'])->name('doctor.add');
