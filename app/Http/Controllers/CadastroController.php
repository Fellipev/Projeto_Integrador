<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index () {
        return view('login.cadastrar');
    }

    public function store (Request $request) {

        $rules = [
            'nome' => 'required|min:6|max:200',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:6'
        ];

        $messages = [
            'nome.required' => 'Campo nome é obrigatório.',
            'nome.min' => 'Nome é curto demais.',
            'nome.max' => 'Nome é muito grande.',
            'email.required' => 'Campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail valido.',
            'email.unique' => 'E-mail já persistido no sistema.',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'A senha está muito curta.'
        ];

        $request->validate($rules, $messages);

        $usuario = new Usuario();
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->senha = md5($request->input('senha'));
        $usuario->save();

        return redirect()->route('healthy.login')->with('msg', 'Cadastro realizado com sucesso!');

    }
}
