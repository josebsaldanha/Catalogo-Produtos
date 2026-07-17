<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Catálogo de Produtos</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<header class="cabecalho">
<div class="container cabecalho-interno">

<a href="{{ route('home') }}" class="logotipo">Cata<span class="logotipo-destaque">logo</span></a>

<div class="barra-pesquisa">
<form method="GET" action="{{ route('home') }}">
<input 
type="text"
name="pesquisa"
value="{{ request('pesquisa') }}"
placeholder="Pesquisar produto..."/>

<button type="submit">Pesquisar</button>
</form>
</div>
<button class="btn-menu" id="btn-menu" aria-label="Abrir menu">&#9776;</button>
<nav class="navegacao" id="navegacao">

<a href="{{ route('home') }}" class="ativo">Produtos</a>
<a href="{{ route('login') }}" class="btn-admin">Admin</a>
</nav>
</div>
</header>

<section class="hero">

<div class="container">

<h1 class="hero-titulo">

Os melhores produtos,

<br />

<span>

num só lugar

</span>
</h1>

<p class="hero-subtitulo">Navegue pelo nosso catálogo e encontre o que precisa de forma rápida e simples.</p>

</div>
</section>

<div class="barra-filtros-pub">

<div class="container">

<div class="filtros-pub-interno">

<span class="filtros-rotulo">Categoria:</span>

<a href="{{ route('home') }}"class="filtro-btn {{ !request('categoria') ? 'ativo':'' }}">Todas</a>

@foreach($categories as $category)

<a href="?categoria={{ $category->id }}"class="filtro-btn {{ request('categoria') == $category->id ? 'ativo':'' }}">
{{ $category->nome }}
</a>

@endforeach
</div>
</div>
</div>

<main class="conteudo">

<div class="container">

<div class="secao-cabecalho">

<h2 class="secao-titulo">Todos os Produtos</h2>

<span class="secao-contagem">{{ $products->total() }} produtos</span>

</div>

<div class="grade-produtos">

@forelse($products as $product)

<div class="cartao-produto">

<div class="cartao-imagem">

@if($product->imagem)

<img src="{{ asset('uploads/produtos/'.$product->imagem) }}"alt="{{ $product->nome }}">

@else

<img src="https://placehold.co/400x300?text=Produto"alt="Produto">

@endif

</div>

<div class="cartao-corpo">

<p class="cartao-categoria">{{ $product->category->nome ?? 'Sem categoria' }}</p>

<h3 class="cartao-nome">{{ $product->nome }}</h3>

<p class="cartao-descricao">{{ Str::limit($product->descricao,80) }}</p>

<div class="cartao-rodape">

<span class="preco">{{ number_format($product->preco,0,',','.') }} Kz</span>

<a href="{{ route('catalog.product',$product) }}"class="btn btn-primario btn-pequeno">Ver detalhes</a>

</div>
</div>
</div>

@empty

<p>Nenhum produto encontrado.</p>

@endforelse

</div>

<div style="margin-top:30px;">{{ $products->links() }}</div>

</div>
</main>

<footer class="rodape">

<div class="container">

<div class="rodape-corpo">

<div class="rodape-marca">

<p class="logotipo">Cata<span class="logotipo-destaque">logo</span></p>

<p>A forma mais simples de gerir e apresentar os seus produtos.</p>

</div>

<div class="rodape-coluna">

<h4>Navegação</h4>

<ul>
<li>
<a href="{{ route('home') }}">
Todos os Produtos
</a>
</li>
</ul>
</div>

<div class="rodape-coluna">

<h4>Sistema</h4>

<ul>

<li>

<a href="{{ route('login') }}">Painel Admin</a>

</li>
</ul>
</div>
</div>

<hr class="rodape-divisor">

<div class="rodape-base">

<p>© 2026 Catálogo de Produtos.</p>

<div class="rodape-selos">

<span class="selo">Laravel 12</span>

<span class="selo">MySQL</span>

<span class="selo">PHP 8</span>

</div>
</div>
</div>
</footer>

<script>
var btn = document.getElementById('btn-menu');
var nav = document.getElementById('navegacao');
btn.addEventListener('click', function(){
nav.classList.toggle('aberta');
});
</script>
</body>
</html>