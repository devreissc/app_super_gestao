@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
                    @csrf
                    {{-- Cria um payload anexado à requisição que pode acessado pelo método put --}}
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $produto->id ?? '' }}">
                    <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input class="borda-preta" type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <input class="borda-preta" type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    <select name="unidade_id">
                        <option value="">Selecione a unidade</option>
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->unidade . ' (' . $unidade->descricao . ')' }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection