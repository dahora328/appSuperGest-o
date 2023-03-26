@if(isset($client->id))
    <form method="post" action="{{ route('client.update',['client' => $client->id])}}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{ route('client.store') }}">
                @csrf
                @endif


                <input type="text" name="nome" value="{{ $client->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : ''}}


                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
