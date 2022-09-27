<h3>fornecedor</h3>
{{--Sintaxe para comentário --}}
@php

@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem fornecedores</h3>
@elseif(count($fornecedores)>10)
    <h3>Existem vários fornecedores</h3>
@else
    <h3>Ainda não existem fornecedores</h3>
@endif
