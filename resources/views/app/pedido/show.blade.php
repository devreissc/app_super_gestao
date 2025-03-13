@extends('app.layouts.basico')

@section('titulo', 'pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar pedido</p>

        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Observação</th>
                            <th>Status</th>
                            <th>Criação</th>
                            <th>Atualização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->observacoes }}</td>
                            <td>{{ $pedido->status }}</td>
                            <td>{{ $pedido->created_at }}</td>
                            <td>{{ $pedido->updated_at }}</td>
                        </tr>
                    </tbody>
            </div>
        </div>
    </div>
@endsection