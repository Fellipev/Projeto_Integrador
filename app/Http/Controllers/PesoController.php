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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
