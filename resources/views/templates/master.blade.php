<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investindo</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    @yield('css-view')
</head>
<body>
    @include('templates.menu-lateral')
    @yield('conteudo-view')
    @yield('js-view')
</body>
</html>