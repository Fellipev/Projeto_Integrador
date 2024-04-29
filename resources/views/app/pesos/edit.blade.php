@extends('app.layouts.main')
@section('title', 'Pesagem')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Editar pesagem!</h1>
        </div>
    </div>
    @component('layouts._components.error')
    @endcomponent
    <form method="POST" action="{{ route('healthy.pesos.update', $peso->id) }}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="peso" class="form-label">Peso.</label>
            <input type="text" name="peso" value="{{ $peso->peso ?? old('peso') }}" class="form-control" id="peso" placeholder="Peso (KG)">
        </div>
        <div class="mb-3 text-center">
            <button class="btn btn-primary">Editar</button>
        </div>
    </form>
@stop
