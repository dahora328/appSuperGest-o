@if(isset($product_detail->id))
    <form method="post" action="{{ route('product-detail.update',['product_detail' => $product_detail->id])}}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{ route('product-detail.store') }}">
                @csrf
                @endif
                <input type="text" name="produto_id" value="{{ $product_detail->produto_id ?? old('produto_id')}}" placeholder="ID do produto" class="borda-preta">
                {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}

                <input type="text" name="comprimento" value="{{ $product_detail->comprimento ?? old('comprimento')}}" placeholder="Comprimento" class="borda-preta">
                {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}

                <input type="text" name="largura"  value="{{ $product_detail->largura ?? old('largura')}}" placeholder="Largura" class="borda-preta">
                {{ $errors->has('largura') ? $errors->first('largura') : ''}}

                <input type="text" name="altura"  value="{{ $product_detail->altura ?? old('altura')}}" placeholder="Altura" class="borda-preta">
                {{ $errors->has('altura') ? $errors->first('altura') : ''}}

                <select name="unidade_id">
                    <option>-- Selecione a Unidade de Medida --</option>

                    @foreach($unities as $unity)
                        <option value="{{ $unity->id }}" {{ ($product_detail->unidade_id ?? old('unidade_id')) == $unity->id ? 'selected' : '' }} >{{ $unity->descricao }}</option>
                    @endforeach
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
