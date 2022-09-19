<?php

use Illuminate\Support\Facades\Route;

Route::get('home', App\Http\Controllers\HomeController::class)->name('home');

Route::put('/usuarios-restore/{slug}', [App\Http\Controllers\UserController::class, 'restore'])->name('user-restore');
Route::put('/usuarios-password', [App\Http\Controllers\UserController::class, 'cambiarPassword'])->name('cambiarPassword');
Route::resource('/usuarios', App\Http\Controllers\UserController::class)->except(['show']);

Route::resource('/perfil', App\Http\Controllers\PerfilController::class)->only(['edit', 'update']);
Route::post('perfil-upload-img', [App\Http\Controllers\PerfilController::class, 'img'])->name('perfil-upload');
Route::put('perfil-password/{perfil}', [App\Http\Controllers\PerfilController::class, 'password'])->name('perfil-password');

Route::resource('roles', App\Http\Controllers\RolController::class);
