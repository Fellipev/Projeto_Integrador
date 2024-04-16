<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuariosController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/healthy')->name('healthy.')->namespace('healthy')->group(function () {

    Route::get('/cadastro', [UsuariosController::class, 'cadastrar'])->name('cadastrar');

});

