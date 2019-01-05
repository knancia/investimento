@extends('templates.master')

@section('css-view')
    
@endsection

@section('js-view')
    
@endsection

@section('conteudo-view')
    
    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

        @include('templates.formulario.input', ['class' => 'text', 'label' => 'CPF', 'input' => 'cpf', 'attributes' => ['placeholder' => 'CPF', 'maxlength' => '11']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone', 'maxlength' => '11']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
        @include('templates.formulario.password', ['class' => 'password', 'label' => 'Senha', 'input' => 'password', 'attributes' => ['placeholder' => 'senha']])
        @include('templates.formulario.submit', ['class' => 'submit', 'input' => 'Cadastrar'])

    {!! Form::close() !!}

@endsection