@extends('admin.layouts.app')
@section('title')
Produtos
@endsection
@section('page-title')
Produtos
@endsection
@section('content')
@if(session('success'))

<div class="alerta alerta-sucesso">

    {{ session('successo') }}

</div>

@endif

<div class="pagina-cabecalho">
    <div>
        <p class="pagina-titulo">
            Lista de Produtos
        </p>
        <p class="pagina-subtitulo">
            Gerir todos os produtos do catálogo.
        </p>
    </div>

    <a href="{{ route('products.create') }}"class="btn btn-primario"> + Novo Produto</a>
</div>

<!-- FILTROS -->
<div class="painel-filtros">
<form method="GET" action="{{ route('products.index') }}">
<div class="filtros-admin-linha">
<div class="grupo-campo">
<label class="rotulo">Nome</label>
<input
class="campo"
type="text"
name="pesquisa"
value="{{ request('pesquisa') }}"
placeholder="Ex: Smartphone..."
style="width:190px;">
</div>
<div class="grupo-campo">
<label class="rotulo">Categoria</label>
<select class="campo" name="categoria">
<option value="">Todas</option>

@foreach($categories as $category)

<option value="{{ $category->id }}"
@if(request('categoria') == $category->id)
selected
@endif
>

{{ $category->nome }}

</option>


@endforeach



</select>


</div>

<div class="grupo-campo">


<label class="rotulo">
Estado
</label>

<select class="campo" name="estado">


<option value="">
Todos
</option>

<option value="disponivel">
Disponível
</option>

<option value="esgotado">
Esgotado
</option>


<option value="promocao">
Promoção
</option>


</select>


</div>

<div class="grupo-campo">


<label class="rotulo" style="visibility:hidden">
Ação
</label>


<button type="submit"
class="btn btn-primario">

Pesquisar

</button>
 <a href="{{ route('products.index') }}"
           class="btn btn-secundario">

            Limpar

        </a>

</div>



</div>


</form>


</div>

<!-- TABELA -->


<div class="cartao-tabela">


<div class="cartao-tabela-cabecalho">


<span class="cartao-tabela-titulo">

{{ $products->total() }}
produtos encontrados

</span>


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

@forelse($products as $product)

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
src="https://placehold.co/80x80?text=P">


@endif


</td>





<td>

{{ $product->nome }}

</td>





<td>

{{ $product->category->nome ?? 'Sem categoria' }}

</td>





<td>

{{ number_format($product->preco,2,',','.') }}
Kz

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
Apagar</a>

</form>
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
<!-- PAGINAÇÃO -->

<div style="margin-top:20px">

{{ $products->links() }}

</div>



@endsection