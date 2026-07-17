<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $product->nome }} - Catálogo</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<header class="cabecalho">

<div class="container cabecalho-interno">

<a href="{{ route('home') }}" class="logotipo">
Cata<span class="logotipo-destaque">logo</span>
</a>

<div class="barra-pesquisa">

<form method="GET" action="{{ route('home') }}">

<input type="text"name="pesquisa"placeholder="Pesquisar produto...">

<button type="submit">Pesquisar</button>

</form>
</div>

<button class="btn-menu" id="btn-menu">&#9776;</button>

<nav class="navegacao" id="navegacao">

<a href="{{ route('home') }}" class="ativo">Produtos</a>
<a href="{{ route('login') }}" class="btn-admin">Admin</a>

</nav>
</div>
</header>

<div class="container">

<nav class="migalha">

<a href="{{ route('home') }}">Produtos</a>

<span>&rsaquo;</span>

<span>{{ $product->nome }}</span>

</nav>

<div class="detalhe-produto">

<div class="imagem-detalhe">

@if($product->imagem)

<img src="{{ asset('uploads/produtos/'.$product->imagem) }}"alt="{{ $product->nome }}">

@else

<img 
src="https://placehold.co/600x500?text=Produto"alt="Produto">

@endif

</div>

<div class="info-produto">

<p class="produto-categoria">{{ $product->category->nome ?? 'Sem categoria' }}</p>

<h1 class="produto-nome">{{ $product->nome }}</h1>

@if($product->estado == 'disponivel')

<span class="etiqueta etiqueta-disponivel">Disponível</span>

@elseif($product->estado == 'promocao')

<span class="etiqueta etiqueta-promocao">Promoção</span>

@else

<span class="etiqueta etiqueta-esgotado">Esgotado</span>

@endif

@if($product->preco_antigo)

<p class="preco-antigo">{{ number_format($product->preco_antigo,0,',','.') }} Kz</p>

@endif

<p class="produto-preco">{{ number_format($product->preco,0,',','.') }} Kz</p>

<p class="produto-descricao">{{ $product->descricao ?? 'Sem descrição disponível.' }}</p>

<hr class="divisor">

<table class="tabela-info">

<tr>

<td>Categoria</td>

<td>{{ $product->category->nome ?? '-' }}</td>

</tr>

<tr>

<td>Estado</td>

<td>{{ ucfirst($product->estado) }}</td>

</tr>

<tr>

<td>Adicionado em</td>

<td>{{ $product->created_at->format('d/m/Y') }}</td>

</tr>
</table>

<div>

<a href="{{ route('home') }}"class="btn btn-secundario">← Voltar aos produtos</a>

</div>
</div>
</div>
<hr class="divisor">

<h2 class="secao-titulo">Produtos relacionados</h2>

<div class="grade-produtos">

@forelse($produtoRelacionados as $produto)

<div class="cartao-produto">

<div class="cartao-imagem">

@if($produto->imagem)

<img src="{{ asset('uploads/produtos/'.$produto->imagem) }}"alt="{{ $produto->nome }}">

@else

<img src="https://placehold.co/400x300?text=Produto"alt="Produto">

@endif

</div>

<div class="cartao-corpo">

<p class="cartao-categoria">{{ $produto->category->nome ?? 'Sem categoria' }}</p>

<h3 class="cartao-nome">

{{ $produto->nome }}

</h3>

<p class="cartao-descricao">

{{ Str::limit($produto->descricao,80) }}

</p>



<div class="cartao-rodape">


<span class="preco">

{{ number_format($produto->preco,0,',','.') }} Kz

</span>



<a href="{{ route('catalog.product',$produto) }}"
class="btn btn-primario btn-pequeno">

Ver detalhes

</a>


</div>


</div>


</div>


@empty

<p>
Nenhum produto relacionado encontrado.
</p>

@endforelse


</div>


</div>

</div>



<footer class="rodape">

<div class="container">


<div class="rodape-corpo">


<div class="rodape-marca">


<p class="logotipo">

Cata<span class="logotipo-destaque">logo</span>

</p>


<p>

A forma mais simples de gerir e apresentar os seus produtos.

</p>


</div>




<div class="rodape-coluna">


<h4>

Navegação

</h4>


<ul>


<li>

<a href="{{ route('home') }}">

Todos os Produtos

</a>

</li>


</ul>


</div>





<div class="rodape-coluna">


<h4>

Sistema

</h4>


<ul>


<li>

<a href="{{ route('login') }}">

Painel Admin

</a>

</li>


</ul>


</div>


</div>




<hr class="rodape-divisor">





<div class="rodape-base">


<p>

© 2026 Catálogo de Produtos.

</p>




<div class="rodape-selos">


<span class="selo">
Laravel 12
</span>


<span class="selo">
MySQL
</span>


<span class="selo">
PHP 8
</span>


</div>


</div>



</div>

</footer>



<script>

var btn = document.getElementById('btn-menu');

var nav = document.getElementById('navegacao');


if(btn){

btn.addEventListener('click', function(){

nav.classList.toggle('aberta');

});

}

</script>


</body>

</html>