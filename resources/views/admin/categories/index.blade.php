<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
</head>
<body>

    <h1>Lista de Categorias</h1>

    @if($categories->isEmpty())
        <p>Nenhuma categoria encontrada.</p>
    @else
        <ul>
            @foreach($categories as $category)
                <li>{{ $category->nome }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>