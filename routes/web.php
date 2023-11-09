<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/create', [ProjectController::class, 'create'])
    ->name('projects.create');

Route::post('/projects/store', [ProjectController::class, 'store'])
    ->name('projects.store');

Route::get('/projects/edit/{project}', [ProjectController::class, 'edit'])
    ->name('projects.edit');

Route::post('/projects/update/{project}', [ProjectController::class, 'update'])
    ->name('projects.update');

Route::post('/projects/delete/{project}', [ProjectController::class, 'destroy'])
    ->name('projects.delete');
