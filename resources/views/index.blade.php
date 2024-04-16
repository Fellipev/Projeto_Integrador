@extends('layouts.main')
@section('title', 'Healthy')
@section('content')
    <p>Teste</p>
    @if ($user != null && $userBanco)
        <p>{{ $user }}</p>
        <p>{{ $userBanco }}</p>
    @endif
@endsection()
