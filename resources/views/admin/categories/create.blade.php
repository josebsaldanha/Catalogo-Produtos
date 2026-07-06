@extends('layouts.admin')
@section('title','Nova Categorias')
@section('content')

<h1>Nova Categoria</h1>

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div>
        <label>Nome</label>
        <input type="text" name="nome">
    </div>

    <br>

    <div>
        <label>Descrição</label>
        <textarea name="descricao"></textarea>
    </div>

    <br>

    <button type="submit">
        Guardar
    </button>

</form>
@endsection
