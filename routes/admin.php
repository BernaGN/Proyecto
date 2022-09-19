<?php

use Illuminate\Support\Facades\Route;

Route::get('home', App\Http\Controllers\HomeController::class)->name('home');

//SISTEMA
Route::put('/usuarios-restore/{slug}', [App\Http\Controllers\UserController::class, 'restore'])->name('user-restore');
Route::put('/usuarios-password', [App\Http\Controllers\UserController::class, 'cambiarPassword'])->name('cambiarPassword');
Route::resource('/usuarios', App\Http\Controllers\UserController::class)->except(['show']);

Route::resource('/perfil', App\Http\Controllers\PerfilController::class)->only(['edit', 'update']);
Route::post('perfil-upload-img', [App\Http\Controllers\PerfilController::class, 'img'])->name('perfil-upload');
Route::put('perfil-password/{perfil}', [App\Http\Controllers\PerfilController::class, 'password'])->name('perfil-password');

Route::resource('roles', App\Http\Controllers\RolController::class);

Route::resource('/auditorias', App\Http\Controllers\AuditController::class)->only('index', 'show');

//CATALOGOS

Route::get('/categorias-restore/{id}', [App\Http\Controllers\CategoriaController::class, 'restore'])->name('categorias-restore');
Route::resource('/categorias', App\Http\Controllers\CategoriaController::class);

Route::resource('/clientes', App\Http\Controllers\ClienteController::class);

Route::get('/etiquetas-restore/{id}', [App\Http\Controllers\EtiquetaController::class, 'restore'])->name('etiquetas-restore');
Route::resource('/etiquetas', App\Http\Controllers\EtiquetaController::class);

Route::resource('/habilidades', App\Http\Controllers\HabilidadController::class);

Route::get('/servicios-restore/{id}', [App\Http\Controllers\ServicioController::class, 'restore'])->name('servicios-restore');
Route::resource('/servicios', App\Http\Controllers\ServicioController::class);

Route::get('/proyectos-restore/{id}', [App\Http\Controllers\ProyectoController::class, 'restore'])->name('proyectos-restore');
Route::resource('/proyectos', App\Http\Controllers\ProyectoController::class);
