@extends('admin.layouts.app')


@section('title')
Dashboard
@endsection


@section('page-title')
Painel
@endsection



@section('content')


<div class="pagina-cabecalho">

    <div>

        <p class="pagina-titulo">
            Visão Geral
        </p>

        <p class="pagina-subtitulo">
            Resumo do estado actual do catálogo.
        </p>

    </div>


    <a href="{{ route('products.create') }}"
       class="btn btn-primario">
        + Novo Produto
    </a>

</div>



<!-- ESTATÍSTICAS -->

<div class="grade-estatisticas">


    <div class="cartao-estatistica">

        <p class="estatistica-rotulo">
            Total de Produtos
        </p>

        <p class="estatistica-valor">
            {{ $totalProdutos }}
        </p>

    </div>



    <div class="cartao-estatistica">

        <p class="estatistica-rotulo">
            Categorias
        </p>

        <p class="estatistica-valor">
            {{ $totalCategorias }}
        </p>

    </div>



    <div class="cartao-estatistica">

        <p class="estatistica-rotulo">
            Esgotados
        </p>

        <p class="estatistica-valor" style="color:var(--erro);">

            {{ $produtosEsgotados }}

        </p>

    </div>




    <div class="cartao-estatistica">

        <p class="estatistica-rotulo">
            Em Promoção
        </p>


        <p class="estatistica-valor" style="color:var(--aviso-texto);">

            {{ $produtosPromocao }}

        </p>


    </div>


</div>






<!-- PRODUTOS RECENTES -->


<div class="cartao-tabela">


<div class="cartao-tabela-cabecalho">

<span class="cartao-tabela-titulo">
Produtos Recentes
</span>


<a href="{{ route('products.index') }}"
class="btn btn-secundario btn-pequeno">

Ver todos

</a>


</div>






<div class="tabela-wrapper">


<table class="tabela-admin">


<thead>

<tr>

<th>
Imagem
</th>

<th>
Nome
</th>

<th>
Categoria
</th>

<th>
Preço
</th>

<th>
Estado
</th>

<th>
Ações
</th>

</tr>

</thead>



<tbody>



@forelse($ultimosProdutos as $product)


<tr>


<td>


@if($product->imagem)


<img
class="tabela-imagem"
src="{{ asset('uploads/produtos/'.$product->imagem) }}"
alt="{{ $product->nome }}">



@else


<img
class="tabela-imagem"
src="https://placehold.co/80x80?text=P"
alt="Produto">


@endif


</td>




<td>

{{ $product->nome }}

</td>




<td>

{{ $product->category->nome ?? 'Sem categoria' }}

</td>




<td>

{{ number_format($product->preco,2,',','.') }} Kz

</td>




<td>


@if($product->estado == 'disponivel')


<span class="etiqueta etiqueta-disponivel">

Disponível

</span>



@elseif($product->estado == 'promocao')


<span class="etiqueta etiqueta-promocao">

Promoção

</span>




@else


<span class="etiqueta etiqueta-esgotado">

Esgotado

</span>



@endif


</td>




<td>


<div class="acoes">


<a href="{{ route('products.edit',$product) }}"
class="btn btn-secundario btn-pequeno">

Editar

</a>




<a href="{{ route('products.delete',$product) }}"
class="btn btn-perigo btn-pequeno">

Apagar

</a>



</div>


</td>



</tr>



@empty


<tr>

<td colspan="6">

Nenhum produto encontrado.

</td>

</tr>



@endforelse



</tbody>


</table>


</div>


</div>



@endsection