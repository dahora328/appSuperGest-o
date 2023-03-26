@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('content')


    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Detalhes do Produto </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>

            </ul>
        </div>

        <div class="informacao-pagina">

            <h4>Produto</h4>
            <div>Nome: {{ $product_detail->product->nome }}</div>
            <br>
            <div> Descrição: {{ $product_detail->product->descricao }}</div>
            <br>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product_detail._components.form_create_edit', ['product_detail' => $product_detail, 'unities' => $unities])
                @endcomponent
            </div>
        </div>
    </div>
@endsection

