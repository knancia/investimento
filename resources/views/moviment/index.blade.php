@extends('templates.master')

@section('conteudo-view')
<table class="default-table">

    <thead>
        <tr>
            <td>Produto</td>
            <td>Nome da Instituição</td>
            <td>Valor Investido</td>

        </tr>
    </thead>

    <tbody>
        @foreach ($product_list as $product)
            <tr>
                <td> {{ $product->name }} </td>
                <td> {{ $product->instituition->name }} </td>
                <td> {{ $product->valueFromUser(Auth::user()) }} </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection