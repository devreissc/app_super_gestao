<form action="{{ ($cliente->id ?? null) ? route('cliente.update', ['produto' => $cliente->id]) : route('cliente.store') }}" method="post">
    @if (!empty($cliente->id))
        @method("PUT")
    @endif
    @csrf
    
    <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input class="borda-preta" type="text" name="email" placeholder="E-mail" value="{{ $cliente->email ?? old('email') }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <input class="borda-preta" type="text" name="telefone" placeholder="Telefone" value="{{ $cliente->telefone ?? old('telefone') }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}

    

    <button type="submit" class="borda-preta">Salvar</button>
</form>