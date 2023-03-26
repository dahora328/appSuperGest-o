@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.provider.add') }}">Novo</a></li>
                <li><a href="{{ route('app.provider') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <body>
                        @foreach($providers as $provider)
                            <tr>
                                <td>{{ $provider->nome }}</td>
                                <td>{{ $provider->site }}</td>
                                <td>{{ $provider->uf }}</td>
                                <td>{{ $provider->email }}</td>
                                <td><a href="{{ route('app.provider.edit', $provider->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.provider.delete', $provider->id) }}">Excluir</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1", style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($provider->products as $key => $product )
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td> {{$product->nome}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                </td>
                            </tr>
                        @endforeach
                    </body>
                </table>
                {{ $providers->appends($request)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
