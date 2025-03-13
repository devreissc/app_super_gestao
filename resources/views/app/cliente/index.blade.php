@extends('app.layouts.basico')

@section('titulo', 'Client')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listar - Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
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
                            <th colspan="4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                
                                <td>Detalhes</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $clientes->appends($request)->links() }}
                <br>Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>
@endsection