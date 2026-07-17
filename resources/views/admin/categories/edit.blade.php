@extends('admin.layouts.app')


@section('title')
Editar Categoria
@endsection



@section('page-title')
Categorias
@endsection




@section('content')



<nav class="migalha-admin">


<a href="{{ route('categories.index') }}">
Categorias
</a>


<span>
&rsaquo;
</span>


<span>
Editar Categoria
</span>


</nav>







@if($errors->any())


<div class="alerta alerta-erro">


<ul>

@foreach($errors->all() as $erro)

<li>
{{ $erro }}
</li>

@endforeach

</ul>


</div>


@endif







@if(session('success'))

<div class="alerta alerta-sucesso">

{{ session('success') }}

</div>

@endif







<form

action="{{ route('categories.update',$category) }}"

method="POST">



@csrf

@method('PUT')






<div class="cartao-formulario">







<!-- NOME DA CATEGORIA -->


<div class="grupo-campo">


<label class="rotulo" for="nome">

Nome da categoria *

</label>



<input

class="campo"

type="text"

id="nome"

name="nome"

value="{{ old('nome',$category->nome) }}"

placeholder="Ex: Electrónica"

required>



</div>








<!-- DESCRIÇÃO -->


<div class="grupo-campo">


<label class="rotulo" for="descricao">

Descrição

</label>




<textarea

class="campo area-texto"

id="descricao"

name="descricao"

rows="3"

placeholder="Descrição opcional...">{{ old('descricao',$category->descricao) }}</textarea>



</div>








<!-- BOTÕES -->


<div class="formulario-acoes">


<a href="{{ route('categories.index') }}"

class="btn btn-secundario">

Cancelar

</a>






<button

type="submit"

class="btn btn-primario">

Actualizar Categoria

</button>
</div>
</div>
</form>
@endsection