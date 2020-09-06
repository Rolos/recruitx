<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{asset('js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <title>RecruitX - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('index')}}">RecruitX</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="{{route('candidatos.index')}}">Candidatos <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="{{route('puestos.index')}}">Puestos</a>
                        <a class="nav-item nav-link" href="{{route('empleados.index')}}">Empleados</a>
                        <a class="nav-item nav-link" href="{{route('competencias.index')}}">Competencias</a>
                        <a class="nav-item nav-link" href="{{route('cniveles.index')}}">Niveles de Capacitaciones</a>
                        <a class="nav-item nav-link" href="{{route('capacitaciones.index')}}">Capacitaciones</a>
                        <a class="nav-item nav-link" href="{{route('idiomas.index')}}">Idiomas</a>
                        <a class="nav-item nav-link" href="{{route('departamentos.index')}}">Departamentos</a>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </body>
</html>
