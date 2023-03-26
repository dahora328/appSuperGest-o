@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href=" {{ route('app.product.create')}} ">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Nome Fornecedor</th>
                        <th>Site Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <body>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->nome }}</td>
                            <td>{{ $product->descricao }}</td>
                            <td>{{ $product->provider->nome}}</td>
                            <td>{{ $product->provider->site}}</td>
                            <td>{{ $product->peso }}</td>
                            <td>{{ $product->unidade_id}}</td>
                            <td> {{ $product->productDetail->comprimento ?? ''}}</td>
                            <td>{{ $product->productDetail->altura ?? ''}}</td>
                            <td>{{ $product->productDetail->largura ?? ''}}</td>
                            <td><a href="{{ route('product.show', ['product' => $product->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('product.edit', ['product' => $product->id]) }} ">Editar</a></td>
                            <td>
                                <form id="form_{{$product->id}}" method="post" action=" {{ route('product.destroy', ['product' => $product->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$product->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12">
                                <p>Pedidos</p>
                                @foreach($product->demands as $demand)
                                    <a href="{{ route('product-demand.create', ['demand' => $demand->id]) }}">
                                        Pedido: {{ $demand->id }},
                                    </a>

                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
                {{ $products->appends($request)->links('pagination::bootstrap-5')}}

                <!--
                <br>
                 {{ $products->count() }} - Total de registros por página

                 {{ $products->total() }} - Total de registros da consulta

                 {{ $products->firstItem() }} - Número do primeiro da página

                 {{ $products->lastItem() }} - Número do ultimo da página

                -->
                <br>
                Exibindo  {{ $products->count() }} produtos de {{ $products->total() }} (de {{$products->firstItem() }} a {{ $products->lastItem() }})
            </div>
        </div>
    </div>
@endsection
