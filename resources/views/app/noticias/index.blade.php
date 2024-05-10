@extends('app.layouts.main')
@section('title', 'Noticias')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Últimas notícias!</h1>
        </div>
    </div>
    @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('healthy.noticias.create') }}"><button class="btn btn-primary">+</button></a>
    </div>

    <div class="row gap-5">
        @foreach ($noticias as $noticia)
            <div class="card" style="width: 18rem;">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-end">
                        <form id="post_{{ $noticia->id }}" method="post" action="{{ route('healthy.noticias.destroy', ['noticia' => $noticia->id]) }}">
                            @csrf
                            @method('delete')
                            <a href="#" onclick="document.getElementById('post_{{ $noticia->id }}').submit()">X</a>
                        </form>
                    </div>
                </div>
                <img src="{{$noticia->url_img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$noticia->titulo}}</h5>
                    <p class="card-text">{{$noticia->descricao}}</p>
                </div>
            </div>
        @endforeach
    </div>
@stop
