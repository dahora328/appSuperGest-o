@if(isset($product->id))
<form method="post" action="{{ route('product.update',['product' => $product->id])}}">
@csrf
@method('PUT')
@else
<form method="post" action="{{ route('app.product.store') }}">
    @csrf
    @endif

    <select name="fornecedor_id">
        <option>-- Selecione Fornecedor --</option>

        @foreach($providers as $provider)
            <option value="{{ $provider->id }}" {{ ($product->fornecedor_id ?? old('fornecedor_id')) == $provider->id ? 'selected' : '' }} >{{ $provider->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}
    <input type="text" name="nome" value="{{ $product->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

    <input type="text" name="descricao" value="{{ $product->descricao ?? old('descricao')}}" placeholder="Descrição" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

    <input type="text" name="peso"  value="{{ $product->peso ?? old('peso')}}" placeholder="Peso" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach($unities as $unity)
            <option value="{{ $unity->id }}" {{ ($product->unidade_id ?? old('unidade_id')) == $unity->id ? 'selected' : '' }} >{{ $unity->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
