@if(isset($demand->id))
    <form method="post" action="{{ route('demand.update',['demand' => $demand->id])}}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{ route('demand.store') }}">
                @csrf
                @endif

                <select name="cliente_id">
                    <option>-- Selecione Cliente --</option>

                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ ($demand->cliente_id ?? old('cliente_id')) == $client->id ? 'selected' : '' }} >{{ $client->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}


                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
