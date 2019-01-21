@extends('templates.master')

@section('conteudo-view')

    @if (session('success'))
        <h3>{{ session('success')['messages'] }}</h3>
    @endif
    {!! Form::open(['route' => ['instituition.product.store', $instituition->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input',  ['label' => 'Nome do Produto',  'input' => 'name'])
        @include('templates.formulario.input',  ['label' => 'Descição',         'input' => 'description'])
        @include('templates.formulario.input',  ['label' => 'Indexador',        'input' => 'index'])
        @include('templates.formulario.input',  ['label' => 'Taxa de juros',    'input' => 'interest_rate'])
        @include('templates.formulario.submit', ['class' => 'submit',           'input' => 'Cadastrar'])
    {!! Form::close() !!}
    
    <table class="default-table">

            <thead>
                <tr>
                    <td>#</td>
                    <td>Nome</td>
                    <td>Descição</td>
                    <td>Indexador</td>
                    <td>Taxa</td>
                    <td>Detalhes</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
    
            <tbody>
                @forelse ($instituition->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->index }}</td>
                        <td>{{ $product->interest_rate }}</td>
                        <td>
                            <a class="detalhes" href="">Detalhes</a>
                        </td>
                        <td>
                            <a class="editar" href="">Editar</a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id, $product->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Excluir') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr> 
                @empty
                    <tr>
                        <td colspan="8"> Nada Cadastrado </td>
                    </tr>
                @endforelse
            </tbody>
    
        </table>

@endsection