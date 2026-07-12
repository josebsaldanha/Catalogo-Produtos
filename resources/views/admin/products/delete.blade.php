@extends('admin.layouts.app')


@section('title')
Apagar Produto
@endsection



@section('page-title')
Produtos
@endsection




@section('content')



<nav class="migalha-admin">

<a href="{{ route('products.index') }}">
Produtos
</a>

<span>
&rsaquo;
</span>

<span>
Apagar Produto
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

Tem a certeza que pretende apagar o seguinte produto?

</p>







<div class="confirmacao-item">



@if($product->imagem)


<img

src="{{ asset('uploads/produtos/'.$product->imagem) }}"

alt="{{ $product->nome }}"

style="width:80px;border-radius:var(--raio);margin-bottom:10px;">



@else


<img

src="https://placehold.co/80x60?text=P"

style="border-radius:var(--raio);margin-bottom:10px;">



@endif






<strong>

{{ $product->nome }}

</strong>





<span style="color:var(--texto-suave);font-size:13px;">


{{ $product->category->nome ?? 'Sem categoria' }}

&nbsp; | &nbsp;

{{ number_format($product->preco,2,',','.') }} Kz


&nbsp; | &nbsp;


@if($product->estado == 'disponivel')

Disponível

@elseif($product->estado == 'promocao')

Promoção

@else

Esgotado

@endif



</span>



</div>








<p class="confirmacao-texto">

O produto será removido permanentemente do catálogo.

</p>







<form

action="{{ route('products.destroy',$product) }}"

method="POST">


@csrf

@method('DELETE')





<div class="confirmacao-acoes">


<a href="{{ route('products.index') }}"

class="btn btn-secundario">

Cancelar

</a>





<button

type="submit"

class="btn btn-perigo">

Sim, apagar produto

</button>
</div>
</form>
</div>
@endsection