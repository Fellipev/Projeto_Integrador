@extends('app.layouts.main')
@section('title', 'Pesagem')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Adicionar pesagens!</h1>
        </div>
    </div>
    @component('layouts._components.error')
    @endcomponent
    <form method="POST" action="{{ route('healthy.pesos.store') }}">
        @csrf
        <div class="mb-3">
            <label for="peso" class="form-label">Peso.</label>
            <input type="text" name="peso" value="{{ old('peso') }}" class="form-control" id="peso" placeholder="Peso (KG)">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </form>
@stop
