<!DOCTYPE html>
<html lang="pt">
<head>

@vite(['resources/css/app.css', 'resources/js/app.js'])
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