@extends('app.layouts.main')
@section('title', 'Pesagem')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Pesagens!</h1>
        </div>
    </div>
    @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <a href="{{ route('healthy.pesos.create') }}"><button class="btn btn-primary">+</button></a>
        </div>
    </div>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuário</th>
            <th scope="col">Peso</th>
            <th scope="col">Dia</th>
            <th colspan="2" scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pesagens as $pesagem)
            <tr>
                <td>{{ $pesagem->id }}</td>
                <td>{{ $pesagem->nome }}</td>
                <td>{{ $pesagem->peso }}</td>
                <td>{{ $pesagem->created_at }}</td>
                <td><a href="{{ route('healthy.pesos.edit', $pesagem->id) }}">Editar</a></td>
                <td>
                    <form id="form_{{$pesagem->id}}" method="post" action="{{ route('healthy.pesos.destroy', $pesagem->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="document.getElementById('form_{{$pesagem->id}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
