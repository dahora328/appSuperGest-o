<div class="topo">

    <div class="logo">
        <img src={{ asset('img/logo.png') }}>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Principal</a></li>
            <li><a href="{{ route('client.index') }}">Cliente</a></li>
            <li><a href="{{ route('demand.index') }}">Pedido</a></li>
            <li><a href="{{ route('app.provider') }}">Fornecedor</a></li>
            <li><a href="{{ route('app.product') }}">Produto</a></li>
            <li><a href="{{ route('app.exit') }}">Sair</a></li>
        </ul>
    </div>
</div>
