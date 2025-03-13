@extends('app.layouts.basico')

@section('titulo', 'Produto do pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhe do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <p>Data do pedido: {{ $pedido->data_pedido }}</p>
            <p>Observações: {{ $pedido->observacoes }}</p>
            <p>Status: {{ $pedido->status }}</p>
            <p>Criado em: {{ $pedido->created_at }}</p>
            <p>Atualizado em: {{ $pedido->updated_at }}</p>
            <h4>Itens do pedido</h4>
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            {{-- <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Total</th> --}}
                            {{-- <th>Ações</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                {{-- <td>{{ $produto->pivot->quantidade }}</td>
                                <td>{{ $produto->pivot->valor }}</td>
                                <td>{{ $produto->pivot->valor * $produto->pivot->quantidade }}</td> --}}
                                {{-- <td>
                                    <form id="form_{{$produto->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection