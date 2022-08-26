<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://kit.fontawesome.com/bbf6ac91e9.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: darkgrey">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">SysHotels</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('create.hotel')}}" class="nav-link">Nuevo Hotel</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
                <p class="mr-2 my-2 mx-2">Bienvenido {{ session()->get('user')->user->name }}</p>
                <a href="{{route('logout')}}" class="btn btn-success">Salir</a>
              </div>
            </div>
          </nav>
@include('layouts.notify')
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card shadow rounded">
                            <div class="card-body">
                                @yield('contentSys')
                            </div>
                            <div class="card-footer text-center">
                                Derechos reservados
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
