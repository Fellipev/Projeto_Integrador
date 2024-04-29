<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"/>

</head>
<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('healthy.cadastro') }}" class="nav-link">Cadastro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
