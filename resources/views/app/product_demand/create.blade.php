@extends('app.layouts.basic')

@section('title', 'Pedido Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('demand.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>ID do pedido: {{ $demand->id }}</p>
            <p>Cliente: {{ $demand->cliente_id }}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do item no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demand->products as $product)
                        <tr>
                            <td> {{ $product->id }}</td>
                            <td> {{ $product->nome }}</td>
                            <td> {{ $product->pivot->created_at->format('d/m/Y') }}</td>
                            <form id="form_{{ $demand->id }}_{{ $product->id }}" method="post" action=" {{ route('product-demand.destroy', ['demand' => $demand->id, 'product' => $product->id]) }}">
                                @method('DELETE')
                                @csrf
                                <td><a href="#" onclick="document.getElementById('form_{{ $demand->id }}_{{ $product->id }}').submit()">Excluir</a> </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.product_demand._components.form_create', ['demand' => $demand, 'products' => $products])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
