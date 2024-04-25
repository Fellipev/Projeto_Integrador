<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        return view('login.logar');
    }

    public function autenticar(Request $request) {
        $rules = [
            'email' => 'required|email',
            'senha' => 'required'
        ];
        $msg = [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Insira um e-mail valido',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($rules, $msg);

        $email = $request->get('email');
        $senha = $request->get('senha');

        $user = new Usuario();

        $usuario = $user->where('email', $email)
            ->where('senha', md5($senha))
            ->get()
            ->first();

        if(isset($usuario->nome)) {
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('healthy.index');
        } else {
            return redirect()->route('healthy.login', ['erro' => 1])->with('msg', 'Usuário não foi encontrado.');
        }
    }
}
