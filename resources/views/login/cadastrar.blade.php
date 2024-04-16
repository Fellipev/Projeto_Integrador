@extends('layouts.main')
@section('title', 'Cadastro')
@section('content')
<div id="create-user-container" class="col-md-5 offset-md-3">
    <h1>Crie sua conta!</h1>
    <form action="{{ route('healthy.gravarUsuario') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome...">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail...">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha...">
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Cadastrar"/>
        </div>
        <div class="form-group text-center">
            <a href="/healthy/login">Logar</a>
        </div>
    </form>
</div>
@endsection()
