@extends('layouts.main')
@section('title', 'Login')
@section('content')
    <div id="create-user-container" class="col-md-5 offset-md-3">
        <h1 class="text-center">Entrar!</h1>
        <form method="POST" action="{{ route('healthy.logar') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" id="email" class="form-control" placeholder="E-mail..."/>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input name="senha" id="senha" class="form-control" placeholder="Senha..."/>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            <div class="form-group text-center">
                <a href="/healthy/cadastro">Cadastrar</a>
            </div>
        </form>
    </div>
@endsection()
