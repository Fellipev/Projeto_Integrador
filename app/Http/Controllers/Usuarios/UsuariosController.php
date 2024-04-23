<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $usuario->email = $request->email;
        $usuario->password = $request->senha;

        $banco = User::where('email', $request->email)->get();

        return view('login.teste', ['banco' => $banco, 'user' => $usuario]);
    }

    public function login() {
        return view('Login.logar');
    }

    public function teste () {

        // $usuario = new User;
        $user = DB::table('users')
                        ->where('id', '=', 1)
                        ->get();

        return view('Login.teste', ['user' => $user]);
    }
}
