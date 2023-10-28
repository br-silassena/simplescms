<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('') }}bootstrap/css/bootstrap.min.css">

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .box {
            display: flex;
        }

        .home {
            width: 50%;

        }

        .login {
            width: 50%;
            padding: 2%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .frmLogin .form-control {
            padding: 1%;
        }

        .home {
            background-image: url("{{asset('empreendimento.jpg')}}");
            background-size: cover; /* Isso faz com que a imagem cubra toda a div */
            background-position: center; /* Centraliza a imagem */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #FFF;
        }

    </style>
</head>

<body>

    <section>
        <div class="box">

            <div class="home">

            <h1>Gestão Simples</h1>

            </div>

            <div class="login">

                <h3>Login</h3>

                <form class="frmLogin" action="{{ asset('logar') }}" style="width: 80%;">
                    <div class="form-group">
                        <input type="email" class="form-control"  name="email" placeholder="E-mail"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">logar</button>
                    </div>
                </form>
                
                @if($errors->any())
                    <div class="alert alert-danger"  role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </section>


 <script src="{{ asset('') }}bootstrap/js/popper.min.js"></script>
  <script src="{{ asset('') }}bootstrap/js/bootstrap.min.js"></script>
</body>

</html>