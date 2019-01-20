@extends('templates.master')

@section('conteudo-view')

    @if (session('success'))
    <h3>{{ session('success')['messages'] }}</h3>
    @endif

    <header>{{ $group->name }}</header> <br>
        
    {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.select', ['class' => 'text', 'label' => 'ID Usuário', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'ID Usuário']])
        @include('templates.formulario.submit', ['class' => 'submit',   'input' => 'Relacionar ao '.$group->name])
    {!! Form::close() !!}

    @include('user.list', ['user_list' => $group->user])

@endsection