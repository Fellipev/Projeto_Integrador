<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PostagensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postagens = Postagem::with(['usuario', 'comentarios'])->paginate(10);
        return view('app.postagem.index', ['postagens' => $postagens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.postagem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|max:200',
            'conteudo' => 'required',
            'url_img' => 'max:500'
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'titulo.max' => 'O campo titulo deve ter no máximo 200 caracteres.',
            'url_img.max' => 'O campo imagem deve contem no máximo 500 caracteres.'
        ];
        $request->validate($regras, $mensagens);

        $user = Usuario::where('nome', $_SESSION['nome'])
            ->where('email', $_SESSION['email'])
            ->first();

        $postagem = new Postagem();
        $postagem->id_usuario = $user->id;
        $postagem->titulo = $request->get('titulo');
        $postagem->conteudo = $request->get('conteudo');
        if($request->get('url_img') != null){
            $postagem->url_img = $request->get('url_img');
        }

        $postagem->save();

        return redirect()->route('healthy.postagem.index')->with('msg', 'Postagem criada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Postagem $postagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postagem $postagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postagem $postagem)
    {
        //
    }
}
