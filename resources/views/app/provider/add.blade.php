@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.provider.index') }}">Voltar</a></li>
                <li><a href="{{ route('app.provider') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.provider.add') }}">
                    <input type="hidden" name="id" value="{{ $provider->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" value="{{ $provider->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="site" value="{{ $provider->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input type="text" name="uf"  value="{{ $provider->uf ?? old('uf') }}"placeholder="UF" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <input type="text" name="email" value="{{ $provider->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
