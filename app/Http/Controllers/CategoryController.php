<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $categories = Category::orderBy('nome')->get();

    return view('admin.categories.index', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.categories.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|unique:categories,nome|max:255',
        'descricao' => 'nullable'
    ]);

    Category::create([
        'nome' => $request->nome,
        'descricao' => $request->descricao,
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Categoria criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
