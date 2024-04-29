@extends('app.layouts.main')
@section('title', 'Nova - Noticia')
@section('content')
    <div id="create-user-container" class="row text-center mb-5">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Adicionar notícias!</h1>
        </div>
    </div>
    @component('layouts._components.error')
    @endcomponent
    <form method="POST" action="{{ route('healthy.noticias.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo da notícia</label>
            <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" id="titulo" placeholder="titulo">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição da notícia</label>
            <input type="text" name="descricao" value="{{ old('descricao') }}" class="form-control" id="descricao" placeholder="Descrição">
        </div>
        <div class="mb-3">
            <label for="url_img" class="form-label">Endereço na imagem</label>
            <input type="text" name="url_img" value="{{ old('url_img') }}" class="form-control" id="url_img" placeholder="Endereço na imagem">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </form>
@stop
