<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('') }}bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{ asset('') }}fontawesome/css/font-awesome.min.css">

  @yield('css')

</head>

<body>
  
  <div class="row">

    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="width:100%">
      <a class="navbar-brand" href="{{ asset('admin') }}">Gestão</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Cadastro
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ asset('admin/usuarios') }}">Usuarios</a>
              <a class="dropdown-item" href="{{ asset('admin/equipamentos') }}">Equipamentos</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav d-flex">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              Configurações
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:;" onclick="logout()">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

  </div>

  <div class="container">

    <h3> Olá, {{Auth::user()->name}} </h3>
    <div class="pt-3">
      @yield('content')
    </div>

  </div>

  <script src="{{ asset('') }}jquery-3.7.1.min.js"></script>
  <script src="{{ asset('') }}bootstrap/js/popper.min.js"></script>
  <script src="{{ asset('') }}bootstrap/js/bootstrap.min.js"></script>
  <script>
    function logout(){
      if(confirm('Tem certeza que deseja sair do sistema?')){
        window.location.href = "{{ asset('admin/logout') }}";
      }
    }
  </script>
  @yield('js')

</body>

</html>