@extends('admin.layouts.app')


@section('title')
Nova Categoria
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
Nova Categoria
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

action="{{ route('categories.store') }}"

method="POST">



@csrf






<div class="cartao-formulario">







<!-- NOME -->


<div class="grupo-campo">


<label class="rotulo">

Nome da categoria *

</label>



<input

class="campo"

type="text"

name="nome"

value="{{ old('nome') }}"

placeholder="Ex: Informática"

required>



</div>








<!-- DESCRIÇÃO -->


<div class="grupo-campo">


<label class="rotulo">

Descrição

</label>



<textarea

class="campo area-texto"

name="descricao"

placeholder="Descreva a categoria...">{{ old('descricao') }}</textarea>



</div>










<!-- AÇÕES -->


<div class="formulario-acoes">


<a

href="{{ route('categories.index') }}"

class="btn btn-secundario">

Cancelar

</a>






<button

type="submit"

class="btn btn-primario">

Guardar Categoria

</button>




</div>







</div>





</form>






@endsection