<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Entrar – Administração</title>


@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>



<body class="pagina-login">



<!-- Coluna esquerda -->

<div class="login-lateral">


<div class="login-lateral-conteudo">


<p class="logotipo">

Cata<span class="logotipo-destaque">logo</span>

</p>



<h2>

Gerir o seu catálogo

<br />

nunca foi tão

<span>

simples

</span>

</h2>




<p>

Adicione produtos, organize categorias e mantenha o seu catálogo sempre atualizado, tudo num só lugar.

</p>





<div class="login-lateral-features">



<div class="login-feature">

<span class="login-feature-icone">

&#10003;

</span>

<span>

Gestão completa de produtos e categorias

</span>

</div>






<div class="login-feature">

<span class="login-feature-icone">

&#10003;

</span>

<span>

Upload de imagens e controlo de stock

</span>

</div>







<div class="login-feature">

<span class="login-feature-icone">

&#10003;

</span>

<span>

Painel com visão geral do catálogo

</span>

</div>




</div>


</div>


</div>









<!-- Painel Login -->

<div class="login-painel">


<div class="cartao-login">





<h1 class="login-titulo">

Entrar no painel

</h1>





<p class="login-subtitulo">

Introduza as suas credenciais para continuar.

</p>








@if(session('status'))

<div class="alerta alerta-sucesso">

{{ session('status') }}

</div>

@endif







@if($errors->any())

<div class="alerta alerta-erro">

{{ $errors->first() }}

</div>

@endif







<form method="POST" action="{{ route('login') }}">


@csrf







<div class="grupo-campo">


<label class="rotulo" for="email">

Email

</label>



<input

class="campo"

type="email"

id="email"

name="email"

value="{{ old('email') }}"

placeholder="admin@email.com"

required

autocomplete="username">



</div>








<div class="grupo-campo">


<label class="rotulo" for="password">

Palavra-passe

</label>




<input

class="campo"

type="password"

id="password"

name="password"

placeholder="••••••••"

required

autocomplete="current-password">



</div>







<div style="display:flex;align-items:center;margin-bottom:15px;">


<label style="font-size:13px;">


<input

type="checkbox"

name="remember">


&nbsp;

Lembrar-me


</label>


</div>







<button

type="submit"

class="btn btn-primario btn-bloco"

style="margin-top:4px;">


Entrar


</button>





</form>







<p style="margin-top:24px;text-align:center;font-size:13px;color:var(--texto-suave);">


<a href="/">

&larr;

Voltar ao catálogo

</a>


</p>







</div>


</div>






</body>

</html>