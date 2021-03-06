@extends('templates.master')

@section('css-view')
    
@endsection

@section('js-view')
    
@endsection

@section('conteudo-view')

    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif

    {!! Form::open(['route' => 'instituition.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

    @include('templates.formulario.input', ['class' => 'text', 'label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('templates.formulario.submit', ['class' => 'submit', 'input' => 'Cadastrar'])

    {!! Form::close() !!}

    <table class="default-table">

        <thead>
            <tr>
                <td>#</td>
                <td>Nome da Instituição</td>
                <td>Detalhes</td>
                <td>Produtos</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($instituitions as $instituicao)
                <tr>
                    <td> {{ $instituicao->id }} </td>
                    <td> {{ $instituicao->name }} </td>
                    <td>
                        <a class="detalhes" href="{{ route('instituition.show', $instituicao->id) }}">Detalhes</a>
                    </td>
                    <td>
                        <a class="produtos" href="{{ route('instituition.product.index', $instituicao->id) }}">Produtos</a>
                    </td>
                    <td>
                        <a class="editar" href="{{ route('instituition.edit', $instituicao->id) }}">Editar</a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['instituition.destroy', $instituicao->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Excluir') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection