@extends('site.layouts.basico')

{{-- @section('titulo', 'Contato') --}}
@section('titulo', $titulo)

@section('conteudo')
    {{-- @include('site.layouts._partials.topo') --}}
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contato' => $motivo_contato])
                    <p>A nossa equipe retornará o mais rápido possível!</p>
                    <p>O nosso tempo médio de resposta é de 48 horas.</p>
                @endcomponent
            </div>
        </div>  
    </div>

    @include('site.layouts._partials.rodape')
@endsection