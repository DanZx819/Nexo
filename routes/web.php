<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['guest'])->group(function () {
    //Rotas de Registro
    Route::get('/register', RegisterController::class)->name('register');

    Route::post('/register', [RegisterController::class, 'register'])->name('registro');

    //Rotas de Login


    Route::get('/login', LoginController::class)->name('login');

    Route::post('/login', [LoginController::class, 'loginIn'])->name('login-in');
});


Route::middleware('auth')->group(function (){

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
});