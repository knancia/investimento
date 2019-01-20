@extends('templates.master')

@section('conteudo-view')

@if (session('success'))
    <h3>{{ session('success')['messages'] }}</h3>
@endif

{!! Form::model($instituitions, ['route' => ['instituition.update', $instituitions->id], 'method' => 'put', 'class' => 'form-padrao']) !!}

    @include('templates.formulario.input', ['class' => 'text', 'label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('templates.formulario.submit', ['class' => 'submit', 'input' => 'Editar'])

{!! Form::close() !!}

@endsection