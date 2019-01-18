@extends('templates.master')

@section('conteudo-view')
    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
    
    @include('templates.formulario.input',  ['class' => 'text',     'label' => 'Nome do Grupo',     'input' => 'name',                                              'attributes' => ['placeholder' => 'Nome do Grupo']])
    @include('templates.formulario.select', ['class' => 'text',     'label' => 'ID Usuário',        'select' => 'user_id',           'data' => $user_list,           'attributes' => ['placeholder' => 'ID Usuário']])
    @include('templates.formulario.select', ['class' => 'text',     'label' => 'ID Instituição',    'select' => 'instituition_id',   'data' => $instituition_list,   'attributes' => ['placeholder' => 'ID Instituição']])
    @include('templates.formulario.submit', ['class' => 'submit',   'input' => 'Cadastrar'])
    
    {!! Form::close() !!}
    
    @include('group.list', ['group_list' => $groups])

@endsection

