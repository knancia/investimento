<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Investindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/stylesheet.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <script src="main.js"></script>
</head>
<body>
    <div class="background"></div>
    
    <section id="conteudo-view" class="login">
        <h1>Investindo</h1>
        <h3>O nosso gerenciador de investimento</h3>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
            <p>Acesse o sistema</p>

            <label>
                {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Usuario']) !!}
            </label>

            <label>
                {!! Form::password('password', ['class' => 'password', 'placeholder' => 'Senha']) !!}
            </label>

            {!! Form::submit('Entrar') !!}
        {!! Form::close() !!}
    </section>
</body>
</html>