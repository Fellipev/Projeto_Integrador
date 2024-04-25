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
    <header>
        <nav class="navbar navbar-expand-lg naxbar-light">
            <div class="m-1 collapse navbar-collapse" id="navbar">
                <a class="img-home" href="/"><img class="img" src="/img/h.jpg"/></a>
                <ul>
                    <li class="nav-item">
                        <a href="" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        @if (isset($_SESSION['email']) && $_SESSION['email'] != '')
                            <a href="{{ route('healthy.cadastro') }}" class="nav-link">Sair</a>
                        @else
                            <a href="{{ route('healthy.cadastro') }}" class="nav-link">Cadastro</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
