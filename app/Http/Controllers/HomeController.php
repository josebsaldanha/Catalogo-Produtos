<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')

            ->when($request->pesquisa, function ($query) use ($request) {
                $query->where(
                    'nome',
                    'like',
                    '%'.$request->pesquisa.'%'
                );
            })

            ->when($request->categoria, function ($query) use ($request) {
                $query->where(
                    'category_id',
                    $request->categoria
                );
            })

            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::orderBy('nome')->get();

        return view('welcome', compact(
            'products',
            'categories'
        ));
    }

    public function show(Product $product)
    {
        $produtoRelacionados = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product', compact(
            'product',
            'produtoRelacionados'
        ));
    }
}