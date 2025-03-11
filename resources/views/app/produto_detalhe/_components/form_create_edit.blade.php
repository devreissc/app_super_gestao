<form action="{{ ($produtoDetalhe->id ?? null) ? route('produto-detalhe.update', ['produto_detalhe' => $produtoDetalhe->id]) : route('produto-detalhe.store') }}" method="post">

    @if (!empty($produtoDetalhe->id))
        @method("PUT")
    @endif

    @csrf

    <select name="produto_id" id="produto_id">
        <option value="">Selecione o produto</option>
        @foreach($produtos as $produto)
            <option value="{{ $produto->id }}" {{ ($produtoDetalhe->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
        @endforeach
    </select>

    <input class="borda-preta" type="text" name="largura" placeholder="largura" value="{{ $produtoDetalhe->largura ?? old('largura') }}">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <input class="borda-preta" type="text" name="altura" placeholder="altura" value="{{ $produtoDetalhe->altura ?? old('altura') }}">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <input class="borda-preta" type="text" name="comprimento" placeholder="comprimento" value="{{ $produtoDetalhe->comprimento ?? old('comprimento') }}">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
    
    <select name="unidade_id">
        <option value="">Selecione a unidade</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produtoDetalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->unidade . ' (' . $unidade->descricao . ')' }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Salvar</button>
</form>