@extends('admin.layouts.app')


@section('title')
Editar Produto
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
        Editar Produto
    </span>

</nav>





@if(session('success'))

<div class="alerta alerta-sucesso">

    {{ session('success') }}

</div>

@endif




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







<form 
action="{{ route('products.update',$product) }}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')




<div class="cartao-formulario">





<!-- NOME -->

<div class="grupo-campo">


<label class="rotulo">

Nome do produto *

</label>



<input

class="campo"

type="text"

name="nome"

value="{{ old('nome',$product->nome) }}"

required>


</div>








<div class="formulario-linha">





<!-- CATEGORIA -->


<div class="grupo-campo">


<label class="rotulo">

Categoria *

</label>



<select

class="campo"

name="category_id"

required>


<option value="">

Selecionar...

</option>



@foreach($categories as $category)



<option 

value="{{ $category->id }}"

@if($product->category_id == $category->id)

selected

@endif

>


{{ $category->nome }}


</option>


@endforeach



</select>


</div>









<!-- ESTADO -->


<div class="grupo-campo">


<label class="rotulo">

Estado *

</label>



<select

class="campo"

name="estado">


<option value="disponivel"

@if($product->estado == 'disponivel')
selected
@endif

>

Disponível

</option>



<option value="esgotado"

@if($product->estado == 'esgotado')
selected
@endif

>

Esgotado

</option>




<option value="promocao"

@if($product->estado == 'promocao')
selected
@endif

>

Promoção

</option>



</select>


</div>










<!-- PREÇO -->


<div class="grupo-campo">


<label class="rotulo">

Preço (Kz) *

</label>



<input

class="campo"

type="number"

name="preco"

value="{{ old('preco',$product->preco) }}"

required>


</div>









<!-- PREÇO ANTIGO -->


<div class="grupo-campo">


<label class="rotulo">

Preço anterior (Kz)

</label>



<input

class="campo"

type="number"

name="preco_antigo"

value="{{ old('preco_antigo',$product->preco_antigo) }}">



<span class="mensagem-ajuda">

Preencher apenas se estiver em promoção.

</span>



</div>



</div>









<!-- DESCRIÇÃO -->


<div class="grupo-campo">


<label class="rotulo">

Descrição *

</label>



<textarea

class="campo area-texto"

name="descricao"

required>{{ old('descricao',$product->descricao) }}</textarea>



</div>









<!-- IMAGEM ATUAL -->


<div class="grupo-campo">


<label class="rotulo">

Imagem atual

</label>



@if($product->imagem)


<img 

src="{{ asset('uploads/produtos/'.$product->imagem) }}"

class="tabela-imagem"

style="width:120px;height:120px;">



@else


<p>
Sem imagem
</p>


@endif



</div>









<!-- NOVA IMAGEM -->


<div class="grupo-campo">


<label class="rotulo">

Alterar imagem

</label>



<input

class="campo"

type="file"

name="imagem"

accept="image/*">



<span class="mensagem-ajuda">

Deixe vazio para manter a imagem atual.

PNG ou JPG. Máximo 2MB.

</span>



</div>









<!-- AÇÕES -->


<div class="formulario-acoes">


<a href="{{ route('products.index') }}"

class="btn btn-secundario">

Cancelar

</a>




<button

type="submit"

class="btn btn-primario">

Atualizar Produto

</button>



</div>





</div>



</form>



@endsection