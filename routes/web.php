<?php

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
Route::delete('users/{user}', [UserController::class,'destroy'])->name('users.destroy');
Route::delete('department/{department}', [DepartmentController::class,'destroy'])->name('department.destroy');
Route::get('users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
Route::get('department/{department}/edit', [DepartmentController::class,'edit'])->name('department.edit');
Route::put('users/{user}/update', [UserController::class,'update'])->name('users.update');
Route::put('department/{department}/update', [DepartmentController::class,'update'])->name('department.update');





