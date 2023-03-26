@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href=" {{ route('client.create')}} ">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <body>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nome }}</td>
                            <td><a href="{{ route('client.show', ['client' => $client->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('client.edit', ['client' => $client->id]) }} ">Editar</a></td>
                            <td>
                                <form id="form_{{$client->id}}" method="post" action=" {{ route('client.destroy', ['client' => $client->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$client->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </body>
                </table>
                {{ $clients->appends($request)->links('pagination::bootstrap-5')}}

                <!--
                <br>
                 {{ $clients->count() }} - Total de registros por página

                 {{ $clients->total() }} - Total de registros da consulta

                 {{ $clients->firstItem() }} - Número do primeiro da página

                 {{ $clients->lastItem() }} - Número do ultimo da página

                -->
                <br>
                Exibindo  {{ $clients->count() }} produtos de {{ $clients->total() }} (de {{$clients->firstItem() }} a {{ $clients->lastItem() }})
            </div>
        </div>
    </div>
@endsection
