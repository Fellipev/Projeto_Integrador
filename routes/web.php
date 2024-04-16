<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuariosController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/healthy')->name('healthy.')->namespace('healthy')->group(function () {

    Route::get('/cadastro', [UsuariosController::class, 'cadastrar'])->name('cadastrar');
    Route::post('/salvar', [UsuariosController::class, 'store'])->name('gravarUsuario');
    Route::get('/login', [UsuariosController::class, 'login'])->name('login');
    Route::post('/logar', [UsuariosController::class, 'logar'])->name('logar');

});

