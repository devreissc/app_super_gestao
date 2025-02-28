<form action="{{ ($produto->id ?? null) ? route('produto.update', ['produto' => $produto->id]) : route('produto.store') }}" method="post">
    @if (!empty($produto->id))
        @method("PUT")
    @endif
    @csrf
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