@extends('admin.layouts.app')


@section('title')
Apagar Categoria
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
Apagar Categoria
</span>


</nav>









<div class="cartao-confirmacao">





<div class="alerta alerta-aviso">

Atenção: esta ação não pode ser desfeita.

</div>








<p class="confirmacao-titulo">

Confirmar exclusão

</p>








<p class="confirmacao-texto">

Tem a certeza que pretende apagar a seguinte categoria?

</p>









<div class="confirmacao-item">


<strong>

{{ $category->nome }}

</strong>



<span style="color:var(--texto-suave); font-size:13px;">


{{ $category->products()->count() }}

produtos associados


</span>



</div>









@if($category->products()->count() > 0)


<div class="alerta alerta-aviso">


Esta categoria possui produtos associados.
A exclusão não será permitida.


</div>


@endif







<p class="confirmacao-texto">

Os produtos associados ficarão sem categoria após a exclusão.

</p>









<form

action="{{ route('categories.destroy',$category) }}"

method="POST">
@csrf

@method('DELETE')

<div class="confirmacao-acoes">

<a href="{{ route('categories.index') }}"class="btn btn-secundario">Cancelar</a>

<button
type="submit"
class="btn btn-perigo"
@if($category->products()->count() > 0)
disabled
@endif>
Sim, apagar categoria
</button>
</div>
</form>
</div>
@endsection