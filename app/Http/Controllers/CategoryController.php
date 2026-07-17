<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function index()
{
    $categories = Category::withCount('products') ->latest()->paginate(10);
    return view('admin.categories.index',compact('categories'));
}

public function create()
{
    return view( 'admin.categories.create');
}

public function store(Request $request)
{
    $validated = $request->validate(['nome'=>'required|max:255|unique:categories,nome','descricao'=>'nullable']);

    Category::create($validated);

    return redirect()->route('categories.index')
    ->with(
        'success',
        'Categoria criada com sucesso!'
    );


}

public function edit(Category $category)
{
    return view('admin.categories.edit',compact('category'));
}

public function update(
Request $request,
Category $category
)
{
    $validated = $request->validate([
        'nome'
        =>'required|max:255|unique:categories,nome,'.$category->id,
        'descricao'
        =>'nullable'
    ]);
    $category->update($validated);
    return redirect()->route('categories.index')
    ->with(
        'success',
        'Categoria atualizada com sucesso!'
    );


}

public function destroy(Category $category)
{

    if($category->products()->count() > 0){
        return redirect()->route('categories.index')
        ->with('error','Não é possível eliminar uma categoria com produtos.');
    }

    $category->delete();
    return redirect()->route('categories.index')
    ->with('success','Categoria eliminada com sucesso!');
}

public function delete(Category $category)
{
    return view('admin.categories.delete', compact('category'));
}
}