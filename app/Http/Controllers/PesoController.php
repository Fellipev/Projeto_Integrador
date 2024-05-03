<?php

namespace App\Http\Controllers;

use App\Models\Peso;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesagens = DB::table('pesos')
            ->join('usuarios', 'pesos.id_usuario', '=', 'usuarios.id' )
            ->select('pesos.*', 'usuarios.nome')
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
        $regras = [
            'peso' => 'required|decimal:2,2',
        ];
        $mensagens = [
            'peso.required' => 'O campo peso é obrigatório',
            'peso.decimal' => 'O campo peso deve conter um número decimal!'
        ];

        $request->validate($regras, $mensagens);

        Peso::find($peso->id)
            ->update(['peso' => $request->get('peso')]);

        return redirect()->route('healthy.pesos.index')->with('msg', 'Peso editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peso $peso)
    {
        $peso->forceDelete();
        return redirect()->route('healthy.pesos.index')->with('msg', 'Peso deletado com sucesso!');
    }
}
