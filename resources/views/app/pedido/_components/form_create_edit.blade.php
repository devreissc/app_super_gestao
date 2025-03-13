<form action="{{ ($pedido->id ?? null) ? route('pedido.update', ['pedido' => $pedido->id]) : route('pedido.store') }}" method="post">
    @if (!empty($pedido->id))
        @method("PUT")
    @endif
    @csrf
    <select name="cliente_id">
        <option value="">Selecione o cliente</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

    <input class="borda-preta" type="date" name="data_pedido" placeholder="Data do pedido" value="{{ $pedido->data_pedido ?? old('data_pedido') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <textarea class="borda-preta" name="observacoes" placeholder="Observação">{{ $pedido->observacoes ?? old('observacoes') }}</textarea>
    {{ $errors->has('observacoes') ? $errors->first('observacoes') : '' }}

    <select name="status">
        <option value="">Selecione o status</option>
        <option value="RE" {{ ($pedido->status ?? old('status')) == 'RE' ? 'selected' : '' }}>Reservado</option>
        <option value="PA" {{ ($pedido->status ?? old('status')) == 'PA' ? 'selected' : '' }}>Pago</option>
        <option value="CA" {{ ($pedido->status ?? old('status')) == 'CA' ? 'selected' : '' }}>Cancelado</option>
    </select>
    {{ $errors->has('status') ? $errors->first('status') : '' }}

    <button type="submit" class="borda-preta">Salvar</button>
</form>