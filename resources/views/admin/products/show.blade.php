<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8">

<title>{{ $product->nome }}</title>

@vite(['resources/css/app.css'])

</head>


<body>


<div class="container">


<h1>
{{ $product->nome }}
</h1>


@if($product->imagem)

<img 
src="{{ asset('uploads/'.$product->imagem) }}"
width="300">

@endif


<p>
Categoria:
{{ $product->category->nome }}
</p>


<p>
{{ $product->descricao }}
</p>


<h2>

{{ number_format($product->preco,0,',','.') }} Kz

</h2>


<a href="{{ route('home') }}"
class="btn btn-secundario">

Voltar
</a>
</div>
</body>
</html>