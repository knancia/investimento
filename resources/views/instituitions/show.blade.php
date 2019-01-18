@extends('templates.master')

@section('conteudo-view')
    
    <header>
        <h1>{{ $instituition->name }}</h1> <br>
    </header>

    @include('group.list', ['group_list' => $instituition->groups])

@endsection