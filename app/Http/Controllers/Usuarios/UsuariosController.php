<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function cadastrar() {
        return view('login.cadastrar');
    }

    public function store(Request $request) {

        $usuario = new User;

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->senha);

        $usuario->save();

        return redirect('healthy.login')->with('msg', 'Conta criada com sucesso!');
    }

    public function logar(Request $request) {

        $usuario = new User;
        $usuario->email = $request->nome;
        $usuario->password = $request->email;

        $usuarioBd = User::search('users')->where('email', $usuario->email)->get();

        return view('index', ['userBanco' => $usuarioBd, 'user' => $usuario]);
    }

    public function login() {
        return view('Login.logar');
    }
}
