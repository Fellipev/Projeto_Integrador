@extends('layouts.main')
@section('title', 'Cadastro')
@section('content')
    <div id="create-user-container" class="row text-center mb-3">
        <div class="col-12 justify-content-center menu-titulo">
            <h1>Crie sua conta!</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div id="create-user-container " class="col-md-5 offset-md-3">
                <form action="{{ route('healthy.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" value="{{ old('nome') }}" name="nome" id="nome" class="form-control" placeholder="Nome...">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="E-mail...">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" value="{{ old('senha') }}" name="senha" id="senha" class="form-control" placeholder="Senha...">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                    </div>
                    <div class="form-group text-center">
                        <a href="{{ route('healthy.login') }}">Logar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
