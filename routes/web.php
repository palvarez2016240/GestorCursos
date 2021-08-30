<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class);

Route::resource('cursos', CursoController::class);

Route::resource('estudiantes', EstudianteController::class);

Route::resource('actividad', ActividadController::class);
