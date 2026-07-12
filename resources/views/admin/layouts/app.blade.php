<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
@yield('title')
</title>
<link rel="stylesheet" href="{{ asset('build/assets/css/estilos.css') }}">
</head>
<body>
<div class="layout-admin">
@include('admin.layouts.sidebar')
<div class="area-admin">
@include('admin.layouts.header')
<main class="conteudo-admin">
@yield('content')

</main>
</div>
</div>
</body>
</html>