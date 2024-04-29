<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesagens = Peso::join('usuarios', 'usuarios.id', '=', 'id_usuario' )
            ->where('email', $_SESSION['email'])
            ->where('nome', $_SESSION['nome'])
            ->get();

        return view('app.pesos.index', ['pesagens' => $pesagens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.pesos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'peso' => 'required|decimal:2,2',
        ];
        $mensagens = [
            'peso.required' => 'O campo peso é obrigatório',
            'peso.decimal' => 'O campo peso deve conter um número decimal!'
        ];

        $request->validate($regras, $mensagens);

        $user = Usuario::where('email', $_SESSION['email'])
            ->where('nome', $_SESSION['nome'])
            ->get()
            ->first();

        $peso = new Peso();
        $peso->id_usuario = $user->id;
        $peso->peso = $request->get('peso');
        $peso->save();

        return redirect()->route('healthy.pesos.index')->with('msg', 'Peso cadastrado com sucesso!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Peso $peso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peso $peso)
    {
        return view ('app.pesos.edit', ['peso' => $peso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peso $peso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peso $peso)
    {
        //
    }
}
