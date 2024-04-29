@extends('app.layouts.main')
@section('title', 'Pesagem')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Pesagens!</h1>
        </div>
    </div>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">Usuário</th>
            <th scope="col">Peso</th>
            <th scope="col">Dia</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pesagens as $pesagem)
            <tr>
                <td>{{ $pesagem->nome }}</td>
                <td>{{ $pesagem->peso }}</td>
                <td>{{ $pesagem->created_at }}</td>
                <td><a href="">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
