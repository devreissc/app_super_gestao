@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('app.fornecedor.listar') }}" method="post">
                    @csrf
                    <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{$request['nome'] ?? ''}}">
                    <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{$request['site'] ?? ''}}">
                    <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{$request['uf'] ?? ''}}">
                    <input class="borda-preta" type="text" name="email" placeholder="Email" value="{{$request['email'] ?? ''}}">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection