@extends('layouts.main')
@section('title', 'Login')
@section('content')

    <div class="row">
        <div class="col-12 justify-content-center">
            <div id="create-user-container" class="row text-center mb-3">
                <div class="col-12 menu-titulo">
                    <h1>Entrar!</h1>
                </div>
            </div>
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            <div class="row">
                <div id="create-user-container" class="col-md-5 offset-md-3">
                    @component('layouts._components.error')
                    @endcomponent
                    <form method="POST" action="{{ route('healthy.logar') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail..."/>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha..."/>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" value="Entrar">
                        </div>
                        <div class="form-group text-center">
                            <a href="/healthy/cadastro">Cadastrar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
