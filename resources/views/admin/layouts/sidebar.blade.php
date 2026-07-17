<aside class="barra-lateral">

<div class="barra-lateral-topo">

<p class="logotipo">
Cata<span class="logotipo-destaque">logo</span>
</p>

</div>


<nav class="menu-lateral">


<a href="{{ route('dashboard') }}"
class="menu-item">

Painel

</a>


<p class="menu-seccao">
Produtos
</p>


<a href="{{ route('products.index') }}"
class="menu-item">

Listar Produtos

</a>


<a href="{{ route('products.create') }}"
class="menu-item">

Novo Produto

</a>


<p class="menu-seccao">
Categorias
</p>


<a href="{{ route('categories.index') }}"
class="menu-item">

Listar Categorias

</a>


<a href="{{ route('categories.create') }}"
class="menu-item">

Nova Categoria

</a>
<p class="menu-seccao">Sistema</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" class="menu-item">
        Sair
    </button>
</form>

</nav>


</aside>