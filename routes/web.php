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
Route::get('/admin-dashboard',[AdminController::class,'admin'])->name('admin.dashboard');

Route::get('/user',[AuthController::class,'verify']);

//-------------------------------Admin Routes------------------------------------------

//Doctor
Route::get('/doctors',[AdminController::class,'viewDoctor'])->name('admin.doctor.view');
Route::post('/add-doctor',[AdminController::class,'addDoctor'])->name('admin.doctor.add');
Route::post('/edit-doctor',[AdminController::class,'editDoctor'])->name('admin.doctor.edit');
Route::get('/delete-doctor/{id}',[AdminController::class,'deleteDoctor'])->name(('admin.doctor.delete'));

//Appointment
Route::get('/appointments',[AdminController::class,'viewAppointment'])->name('admin.appointment.view');
//--------------------------------User Route-----------------------------------------------

//------------------Appointment-----------------------
Route::post('/appointment',[UserController::class,'appointment'])->name('appointment');