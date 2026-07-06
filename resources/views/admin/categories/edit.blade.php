@extends('layouts.admin')
@section('title','Editar Categoria')
@section('content')

<h1>Editar Categoria</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="{{old('nome',$category->nome)}}">
    </div>

    <br>

    <div>
        <label>Descrição</label>
        <textarea name="descricao">{{old('descrição',$category->descricao)}}</textarea>
    </div>

    <br>

    <button type="submit">
        Atualizar
    </button>

</form>
@endsection
