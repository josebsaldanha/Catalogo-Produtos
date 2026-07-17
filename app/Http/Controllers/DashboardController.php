<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Product::count();

        $totalCategorias = Category::count();

        $produtosEsgotados = Product::where('estado', 'esgotado')->count();

        $produtosPromocao = Product::where('estado', 'promocao')->count();

        $ultimosProdutos = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProdutos',
            'totalCategorias',
            'produtosEsgotados',
            'produtosPromocao',
            'ultimosProdutos'
        ));
    }
}