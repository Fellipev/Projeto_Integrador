<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesoController;
use App\Http\Controllers\PostagensController;
use App\Http\Controllers\PostagemComentarioController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/healthy')->name('healthy.')->group(function () {

    Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');
    Route::post('/cadastro', [CadastroController::class, 'store'])->name('store');

    Route::get('/logar/{erro?}', [LoginController::class, 'index'])->name('login');
    Route::post('/logar', [LoginController::class, 'autenticar'])->name('logar');

    Route::middleware('ath')->group(function () {

        Route::resource('noticias', NoticiaController::class);
        Route::resource('pesos', PesoController::class);
        Route::resource('postagem', PostagensController::class);
        Route::resource('comentario', PostagemComentarioController::class);

        Route::get('/sair', [LoginController::class, 'sair'])->name('sair');

    });

});


