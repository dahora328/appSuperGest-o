@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product_detail._components.form_create_edit', ['unities' => $unities])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
