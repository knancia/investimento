@extends('templates.master')

@section('css-view')
    
@endsection

@section('js-view')
    
@endsection

@section('conteudo-view')
    
    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

        @include('templates.formulario.input', ['class' => 'text', 'label' => 'CPF', 'input' => 'cpf', 'attributes' => ['placeholder' => 'CPF', 'maxlength' => '11']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone', 'maxlength' => '11']])
        @include('templates.formulario.input', ['class' => 'text', 'label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
        @include('templates.formulario.submit', ['class' => 'submit', 'input' => 'Atualizar'])

    {!! Form::close() !!}

@endsection