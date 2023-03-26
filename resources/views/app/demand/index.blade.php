@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href=" {{ route('demand.create')}} ">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <body>
                    @foreach($demands as $demand)
                        <tr>
                            <td>{{ $demand->id }}</td>
                            <td>{{ $demand->cliente_id }}</td>
                            <td><a href="{{ route('demand.show', ['demand' => $demand->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('demand.edit', ['demand' => $demand->id]) }} ">Editar</a></td>
                            <td>
                                <form id="form_{{$demand->id}}" method="post" action=" {{ route('demand.destroy', ['demand' => $demand->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$demand->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
                {{ $demands->appends($request)->links('pagination::bootstrap-5')}}

                <!--
                <br>
                 {{ $demands->count() }} - Total de registros por página

                 {{ $demands->total() }} - Total de registros da consulta

                 {{ $demands->firstItem() }} - Número do primeiro da página

                 {{ $demands->lastItem() }} - Número do ultimo da página

                -->
                <br>
                Exibindo  {{ $demands->count() }} produtos de {{ $demands->total() }} (de {{$demands->firstItem() }} a {{ $demands->lastItem() }})
            </div>
        </div>
    </div>
@endsection
