<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <head>
        <h2>Catalogo de Produtos</h2>
        <hr>
        <a href="{{route('categories.index')}}">Categorias</a>
        <a href="{{route('products.index')}}">Produtos</a>
        <hr>
    </head>
    <main>
        @yield('content')
    </main>
</body>
</html>