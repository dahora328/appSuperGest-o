<form method="post" action="{{ route('product-demand.store', ['demand' => $demand]) }}">
    @csrf
    <select name="produto_id">
        <option>-- Selecione um Produto --</option>

        @foreach($products as $product)
            <option value="{{ $product->id }}" {{old('produto_id') == $product->id ? 'selected' : ''}} >{{$product->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}

    <input type="number" name="quantidade" value=" {{ old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : ''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
