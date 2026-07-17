@extends('admin.layouts.app')


@section('title')
Categorias
@endsection



@section('page-title')
Categorias
@endsection




@section('content')



@if(session('success'))

<div class="alerta alerta-sucesso">

    {{ session('success') }}

</div>

@endif




@if(session('error'))

<div class="alerta alerta-erro">

    {{ session('error') }}

</div>

@endif







<div class="pagina-cabecalho">


<div>


<p class="pagina-titulo">

Lista de Categorias

</p>


<p class="pagina-subtitulo">

Gerir categorias dos produtos do catálogo.

</p>


</div>





<a href="{{ route('categories.create') }}"
class="btn btn-primario">

+ Nova Categoria

</a>



</div>









<div class="cartao-tabela">



<div class="cartao-tabela-cabecalho">


<span class="cartao-tabela-titulo">

{{ $categories->total() }}

categorias encontradas

</span>


</div>







<div class="tabela-wrapper">



<table class="tabela-admin">


<thead>


<tr>


<th>
Nome
</th>


<th>
Descrição
</th>


<th>
Produtos
</th>


<th>
Criada em
</th>


<th>
Ações
</th>


</tr>


</thead>






<tbody>



@forelse($categories as $category)



<tr>


<td>

<strong>

{{ $category->nome }}

</strong>

</td>






<td>

{{ $category->descricao ?? 'Sem descrição' }}

</td>






<td>


<span class="etiqueta etiqueta-disponivel">

{{ $category->products_count }}

Produtos

</span>


</td>






<td>

{{ $category->created_at->format('d/m/Y') }}

</td>








<td>


<div class="acoes">



<a href="{{ route('categories.edit',$category) }}"class="btn btn-secundario btn-pequeno">
Editar
</a>

<a href="{{ route('categories.delete',$category) }}"class="btn btn-perigo btn-pequeno">
Apagar
</a>
</div>
</td>
</tr>
@empty
<tr>
<td colspan="5">
Nenhuma categoria encontrada.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
<div style="margin-top:20px">

{{ $categories->links() }}

</div>
@endsection