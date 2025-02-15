<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\ShowUserArticles;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'inicio'])->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('articles',ShowUserArticles::class)->name('articles');
    Route::resource('tags',TagController::class)->middleware(AdminMiddleware::class);
});

Route::get('contacto',[ContactoController::class,'pintarFcontacto'])->name('contacto.pintar');
Route::post('contacto',[ContactoController::class,'procesarF'])->name('contacto.procesar');