@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listar - Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                {{-- {{ $produtos->toJson() }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Fornecedor</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Criação</th>
                            <th>Atualização</th>
                            <th>Unidade</th>
                            <th>comprimento</th>
                            <th>largura</th>
                            <th>Altura</th>
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->created_at }}</td>
                                <td>{{ $produto->updated_at }}</td>
                                <td>{{ $produto->unidade->unidade }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                {{-- ->produtoDetalhe corresponde ao nome do método no relacionamento dentro do model --}}
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>

                            <tr>
                                <td colspan="13">
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <p>Id: {{ $pedido->id }} | Cliente: {{ $pedido->cliente_id }} | Data: {{ $pedido->data_pedido }}</p><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produto</a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $produtos->appends($request)->links() }}
                <br>Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection