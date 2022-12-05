<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'list'])->name('user.index');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::get('/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/', [UserController::class, 'store'])->name('user.store');
Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
