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
    
    <table class="default-table">

            <thead>
                <tr>
                    <td>#</td>
                    <td>Nome do Grupo</td>
                    <td>Instituição</td>
                    <td>Usuário</td>
                    <td>Detalhes</td>
                    <td>Excluir</td>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td> {{ $group->id }} </td>
                        <td> {{ $group->name }} </td>
                        <td> {{ $group->instituition->name }} </td>
                        <td> {{ $group->owner->name }} </td>
                        <td>
                            <a class="detalhes" href="{{ route('group.show', $group->id) }}">Detalhes</a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Excluir') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table> 

@endsection

