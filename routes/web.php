<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Usuarios\UsuariosController;
use App\Http\Controllers\healthy\PrincipalController;
//use App\Http\Middleware\AutenticacaoMiddleware;
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
        Route::get('/index', [PrincipalController::class, 'index'])->name('index');

    });

});


