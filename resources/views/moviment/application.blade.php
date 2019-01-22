@extends('templates.master')
@section('conteudo-view')
    
    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'moviment.application.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
    
   
    @include('templates.formulario.select', ['class' => 'text',     'label' => 'Grupo',     'select' => 'group_id',     'data' => $group_list ?? [],     'attributes' => []])
    @include('templates.formulario.select', ['class' => 'text',     'label' => 'Produto',   'select' => 'product_id',   'data' => $product_list ?? [],   'attributes' => []])
    @include('templates.formulario.input',  ['class' => 'text',     'label' => 'Valor',     'input' => 'value',                                           'attributes' => ['placeholder' => 'Valor']])
    @include('templates.formulario.submit', ['class' => 'submit',   'input' => 'Cadastrar'])
    
    {!! Form::close() !!}

@endsection