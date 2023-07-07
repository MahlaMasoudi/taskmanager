<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\loginRegisterController;
use App\Http\Middleware\authcheck;

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

Route::prefix('task')->group(function(){

Route::get('/',[TaskController::class,'index'])->name('task.index');
Route::get('/create',[TaskController::class,'create'])->name('task.create');
Route::post('/store',[TaskController::class,'store'])->name('task.store');
Route::get('/edit/{task}',[TaskController::class,'edit'])->name('task.edit');
Route::put('/update/{task}',[TaskController::class,'update'])->name('task.update');
Route::delete('/delete/{task}',[TaskController::class,'destroy'])->name('task.destroy');
Route::get('/status/{task}', [TaskController::class, 'status'])->name('task.status');
});

Route::get('/register',[loginRegisterController::class,'registerForm'])->name('register');
Route::post('/authregister',[loginRegisterController::class,'authregister'])->name('authregister');

Route::get('/login',[loginRegisterController::class,'loginForm'])->name('login');

Route::post('/authlogin',[loginRegisterController::class,'authlogin'])->name('authlogin');

Route::get('/logout',[loginRegisterController::class,'logout'])->name('logout');
