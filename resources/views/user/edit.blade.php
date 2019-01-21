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

    @include('templates.formulario.input',      ['label' => 'CPF',          'input' => 'Formattedcpf',           'attributes'    => [ 'maxlength' => '11']])
    @include('templates.formulario.input',      ['label' => 'Nome',         'input' => 'name'])
    @include('templates.formulario.input',      ['label' => 'Telefone',     'input' => 'Formattedphone',         'attributes'    => [ 'maxlength' => '11']])
    @include('templates.formulario.date',       ['class' => 'date',         'label' => 'Nascimento',    'input'         => 'birth',     'attributes' => ['placeholder' => 'Nascimento']])
    @include('templates.formulario.radio',      ['class' => 'radio',        'label' => 'Sexo',          'radio'         => 'gender',    'gender' => 'M', 'sexo' => 'Masculino'])
    @include('templates.formulario.radio',      ['class' => 'radio',        'label' => 'Sexo',          'radio'         => 'gender',    'gender' => 'F', 'sexo' => 'Feminino'])
    @include('templates.formulario.input',      ['label' => 'E-mail',       'input' => 'email'])
    @include('templates.formulario.submit',     ['class' => 'submit',       'input' => 'Editar'])

    {!! Form::close() !!}

@endsection