<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /*** Lista produtos*/
    public function index(Request $request)
    {
        $query = Product::with('category');
        // Pesquisa por nome

        if($request->filled('pesquisa')){

            $query->where('nome','like', '%'.$request->pesquisa.'%');
        }
        // Filtro categoria

        if($request->filled('categoria')){

            $query->where('category_id',$request->categoria);
        }
        // Filtro estado

        if($request->filled('estado')){

            $query->where('estado',$request->estado);
        }
        $products = $query->latest()->paginate(10)->withQueryString();

        $categories = Category::orderBy('nome')->get();

        return view( 'admin.products.index',compact('products','categories'));
    }

    /*** Formulário criar produto*/

    public function create()
    {
        $categories = Category::all();

        return view(
            'admin.products.create',
            compact('categories')
        );

    }
    /*** Guardar produto*/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'
            =>'required|exists:categories,id',


            'nome'
            =>'required|max:255',


            'descricao'
            =>'nullable',


            'preco'
            =>'required|numeric|min:0',


            'preco_antigo'
            =>'nullable|numeric|min:0',


            'estado'
            =>'required|in:disponivel,esgotado,promocao',


            'imagem'
            =>'nullable|image|mimes:jpg,jpeg,png|max:2048'


        ]);

        // Upload imagem

        if($request->hasFile('imagem')){


            $imagem = $request
                    ->file('imagem');


            $nomeImagem =
            time().'_'.$imagem->getClientOriginalName();



            $imagem->move(
                public_path('uploads/produtos'),
                $nomeImagem
            );
            $validated['imagem']
            =$nomeImagem;

        }






        Product::create($validated);





        return redirect()
        ->route('products.index')
        ->with(
            'success',
            'Produto criado com sucesso!'
        );


    }
    /**
     * Mostrar produto
     */

    public function show(Product $product)
    {
        return view( 'admin.products.show', compact('product'));
    }
    /**
     * Editar
     */

    public function edit(Product $product)
    {


        $categories = Category::all();



        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories'
            )
        );


    }
    /*** Atualizar produto*/

    public function update(
        Request $request,
        Product $product
    )
    {
        $validated = $request->validate([
            'category_id'
            =>'required|exists:categories,id',
            'nome'
            =>'required|max:255',
            'descricao'
            =>'nullable',
            'preco'
            =>'required|numeric|min:0',
            'preco_antigo'
            =>'nullable|numeric|min:0',
            'estado'
            =>'required|in:disponivel,esgotado,promocao',
            'imagem'
            =>'nullable|image|mimes:jpg,jpeg,png|max:2048']);
            
        // substituir imagem

        if($request->hasFile('imagem')){


            if($product->imagem &&
            File::exists(
            public_path('uploads/produtos/'.$product->imagem)
            )){


                File::delete(
                public_path('uploads/produtos/'.$product->imagem)
                );

            }




            $imagem =
            $request->file('imagem');


            $nomeImagem =
            time().'_'.$imagem->getClientOriginalName();



            $imagem->move(
                public_path('uploads/produtos'),
                $nomeImagem
            );



            $validated['imagem']
            =$nomeImagem;



        }







        $product->update($validated);





        return redirect()
        ->route('products.index')
        ->with(
            'success',
            'Produto atualizado com sucesso!'
        );


    }
    /**    * Apagar produto */
    public function destroy(Product $product)
    {
        dd(public_path('uploads/produtos/'.$product->imagem));

        if($product->imagem &&
        File::exists(
        public_path('uploads/produtos/'.$product->imagem)
        )){
            File::delete(
            public_path('uploads/produtos/'.$product->imagem)
            );
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Produto eliminado com sucesso!');
    }
    public function delete(Product $product)
    {

        return view('admin.products.delete',compact('product'));

    }


}