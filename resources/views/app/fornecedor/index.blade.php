<h3>Fornecedor</h3>

{{-- Incluindo o componente de listagem de fornecedores --}}

{{-- @php
    if(){
        # code...
    }elseif (condition) {
        # code...
    }else{
        # code...
    }
@endphp --}}

{{-- @dd($fornecedores); --}}

{{-- @isset($fornecedores)
    @if(count($fornecedores) > 0 && count($fornecedores) < 10)
        <h3>Existem fornecedores</h3>
    @elseif(count($fornecedores) > 10)
        <h3>Existem muitos fornecedores</h3>
    @else
        <h3>Não existem fornecedores</h3>
    @endif

    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] }}

    @if($fornecedores[0]['status'] == 'N')
        <h3>Inativo</h3>
    @endif

    @unless($fornecedores[0]['status'] == 'A')
        <h3>Inativo</h3>
    @endunless
@endisset --}}

{{-- @switch($fornecedores[0]['status'])
    @case('N')
        <h3>Inativo</h3>
        @break
    @case('A')
        <h3>Ativo</h3>
        @break
    @default
        <h3>Status desconhecido</h3>
        @break
@endswitch --}}

{{-- @for($i = 0; $i < count($fornecedores); $i++)
    <hr>
    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <br>
    Status: {{ $fornecedores[$i]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[$i]['cnpj'] }}
    <br>
    <br>
@endfor

@for($i = 0; isset($fornecedores[$i]); $i++)
    @switch($fornecedores[$i]['status'])
        @case('N')
            <h3>Inativo</h3>
            @break
        @case('A')
            <h3>Ativo</h3>
            @break
        @default
            <h3>Status desconhecido</h3>
            @break
    @endswitch
@endfor --}}

{{-- @foreach($fornecedores as $fornecedor) --}}
{{-- @foreach($fornecedores as $indice => $fornecedor)
    <hr>
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] }}
    <br>
    <br>
@endforeach --}}

@forelse($fornecedores as $indice => $fornecedor)
    Iteração atual: {{ $loop->iteration }}
    <hr>
    Fornecedor: @{{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] }}
    <br>
    <br>
@empty
    <p>Não existem fornecedores cadastrados</p>
@endforelse

