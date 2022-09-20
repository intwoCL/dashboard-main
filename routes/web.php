<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'index'])->name('root');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');



Route::middleware('auth.usuario')->group( function () {
  Route::any('/sign_out', [AuthController::class, 'sign_out'])->name('auth.sign_out');

  // Route::get('/blank', function () {
  //   return view('blank');
  // });
  Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});
