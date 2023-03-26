@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.product')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product._components.form_create_edit', ['unities' => $unities, 'providers' => $providers])
                @endcomponent
            </div>
        </div>
    </div>
@endsection