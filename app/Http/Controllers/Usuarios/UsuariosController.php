<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    public function cadastrar() {
        return view('login.cadastrar');
    }
}
