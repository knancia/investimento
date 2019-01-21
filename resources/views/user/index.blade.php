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

        @include('templates.formulario.input',      ['label' => 'CPF',          'input' => 'cpf',           'attributes'    => [ 'maxlength' => '11']])
        @include('templates.formulario.input',      ['label' => 'Nome',         'input' => 'name'])
        @include('templates.formulario.input',      ['label' => 'Telefone',     'input' => 'phone',         'attributes'    => [ 'maxlength' => '11']])
        @include('templates.formulario.date',       ['class' => 'date',         'label' => 'Nascimento',    'input'         => 'birth',     'attributes' => ['placeholder' => 'Nascimento']])
        @include('templates.formulario.radio',      ['class' => 'radio',        'label' => 'Sexo',          'radio'         => 'gender',    'gender' => 'M', 'sexo' => 'Masculino'])
        @include('templates.formulario.radio',      ['class' => 'radio',        'label' => 'Sexo',          'radio'         => 'gender',    'gender' => 'F', 'sexo' => 'Feminino'])
        @include('templates.formulario.input',      ['label' => 'E-mail',       'input' => 'email'])
        @include('templates.formulario.password',   ['label' => 'Senha',        'input' => 'password',      'attributes'    => ['placeholder' => 'senha']])
        @include('templates.formulario.submit',     ['class' => 'submit',       'input' => 'Cadastrar'])

    {!! Form::close() !!}

    @include('user.list', ['user_list' => $users])

@endsection