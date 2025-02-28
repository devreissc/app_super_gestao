@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ ($fornecedor->id ?? null) ? 'Editar' : 'Adicionar' }} - Fornecedor</p>

        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width:90%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $fornecedor->nome ?? old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{ $fornecedor->site ?? old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{ $fornecedor->uf ?? old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <input class="borda-preta" type="text" name="email" placeholder="Email" value="{{ $fornecedor->email ?? old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection