@extends('layouts.admin')
@section('title','Categorias')
@section('content')

    <h1>Categorias</h1>

    <a href="{{ route('categories.create')}}">Nova Categoria</a>

    @if(session('sucess'))

    <p>{{(session('sucess'))}}</p>

    @endif

    @if($categories->isEmpty())
        <p>Nenhuma categoria encontrada.</p>
    @else

    <table border = "1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>

        @foreach($categories as $category)

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->nome }}</td>
            <td>{{ $category->descricao }}</td>
            <td>
                <a href="{{route('categories.edit', $category)}}">Editar</a>
                <form action="{{route('categories.destroy', $category)}}" method="POST" style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Deseja eliminar esta categoria?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    @endif
    @endsection
       