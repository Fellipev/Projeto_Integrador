@extends('app.layouts.main')
@section('title', 'Criar postagem')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Criar postagens!</h1>
        </div>
    </div>
    @component('app.postagem._components.form_create_edit')
    @endcomponent

@stop
