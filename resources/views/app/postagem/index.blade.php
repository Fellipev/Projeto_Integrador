@extends('app.layouts.main')
@section('title', 'Blog')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Blog!</h1>
        </div>
    </div>
    @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div class="row">
        <div class="col-12">
            <a href="{{ route('healthy.postagem.create') }}"><button class="btn btn-primary">+</button></a>
        </div>
    </div>

    <div class="container mt-5" style="width: 40%">
    @foreach($postagens as $postagem)
        <div class="card mb-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        @ {{ $postagem->usuario->nome }} - {{ $postagem->titulo }}
                    </div>
                    @if ( $postagem->usuario->email == $_SESSION['email'])
                        <div class="col-1">
                            <form id="post_{{$postagem->id}}" method="POST" action="{{ route('healthy.postagem.destroy', ['postagem' => $postagem->id]) }}">
                                @CSRF
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('post_{{$postagem->id}}').submit()">X</a>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <div class="content-card">
                        <p class="text-center">{{ $postagem->conteudo }}</p>
                        @if (isset($postagem->url_img))
                            <div class="text-center mb-3">
                                <img src="{{ $postagem->url_img }}" class="rounded img-blog">

                            </div>
                        @endif
                    </div>
                    <footer class="footer">
                        <div class="form-floating">
                            @if(isset ($postagem->comentarios))
                                <div class="comentarios">
                                    @foreach($postagem->comentarios as $comentario)
                                        <p>{{ $comentario->usuario->nome }}: {{ $comentario->comentario }}</p>
                                        <hr>
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('healthy.comentario.store') }}">
                                @csrf
                                <input type="hidden" name="postagem_id" value="{{$postagem->id}}"/>
                                <textarea class="form-control" name="comentario" placeholder="Deixe um comentário aqui!" id="floatingTextarea"></textarea>
                                <button type="submit" class="btn btn-primary mt-1">Comentar</button>
                            </form>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
    @endforeach
    </div>

@stop
