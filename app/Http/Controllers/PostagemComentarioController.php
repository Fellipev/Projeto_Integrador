<?php

namespace App\Http\Controllers;

use App\Models\PostagemComentario;
use Illuminate\Http\Request;
use App\Models\Usuario;

class PostagemComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'comentario' => 'min:1'
        ];
        $mensagens = [
            'comentario.min' => 'Não é possível fazer comentários vazios!'
        ];
        $request->validate($regras, $mensagens);

        $user = Usuario::where('nome', $_SESSION['nome'])
            ->where('email', $_SESSION['email'])
            ->first();

        $comentario = new PostagemComentario();
        $comentario->usuario_id = $user->id;
        $comentario->postagem_id = $request->get('postagem_id');
        $comentario->comentario = $request->get('comentario');
        $comentario->save();

        return redirect()->route('healthy.postagem.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostagemComentario $postagemComentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostagemComentario $postagemComentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostagemComentario $postagemComentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostagemComentario $postagemComentario)
    {
        //
    }
}
