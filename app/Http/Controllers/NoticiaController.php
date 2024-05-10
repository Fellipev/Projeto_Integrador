<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view ('app.noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('app.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|max:200',
            'descricao' => 'required|max:500',
            'url_img' => 'required|'
        ];
        $mensagens = [
            'required' => 'Por favor preencha todos os campos!',
            'titulo.max' => 'O campo titulo tem limite de 200 caracteres',
            'descricao.max' => 'O campo descricao tem limite de 500 caracteres',
        ];
        $request->validate($regras, $mensagens);

        Noticia::create($request->all());
        return redirect()->route('healthy.noticias.index')->with('msg', 'Noticia cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('healthy.noticias.index');
    }
}
