@extends('admin.layouts.app')


@section('title')
Novo Produto
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
        Novo Produto
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
action="{{ route('products.store') }}"
method="POST"
enctype="multipart/form-data">


@csrf



<div class="cartao-formulario">





<!-- NOME -->


<div class="grupo-campo">


<label class="rotulo" for="nome">

Nome do produto *

</label>



<input

class="campo"

type="text"

id="nome"

name="nome"

value="{{ old('nome') }}"

placeholder="Ex: Smartphone X200"

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

@if(old('category_id') == $category->id)
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
name="estado"
required>



<option value="disponivel">

Disponível

</option>



<option value="esgotado">

Esgotado

</option>



<option value="promocao">

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

value="{{ old('preco') }}"

placeholder="Ex: 72000"

min="0"

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

value="{{ old('preco_antigo') }}"

placeholder="Opcional"

min="0">



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

placeholder="Descreva o produto..."

required>{{ old('descricao') }}</textarea>


</div>











<!-- IMAGEM -->


<div class="grupo-campo">


<label class="rotulo">

Imagem do produto

</label>



<input

class="campo"

type="file"

name="imagem"

accept="image/*">



<span class="mensagem-ajuda">

PNG ou JPG. Máximo 2 MB.

</span>



</div>









<!-- BOTÕES -->


<div class="formulario-acoes">


<a 

href="{{ route('products.index') }}"

class="btn btn-secundario">

Cancelar

</a>





<button 

type="submit"

class="btn btn-primario">

Guardar Produto

</button>



</div>





</div>


</form>





@endsection