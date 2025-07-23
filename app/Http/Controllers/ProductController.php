<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {   
        
        $foto_path = $request->storePhoto();

        Produto::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'foto' => $foto_path,
            'quantidade' => $request->quantidade
        ]);



        return to_route('dashboard')->with('message', 'Produto Criado com sucesso !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        
        return view('admin.edit_product', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request)
    {
        $update = $request->UpdateProduct();


        
        $produtos = Produto::all();

        return to_route('admin.menu', compact('produtos'))->with('message', 'Produto editado com sucesso !!!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        if($produto->foto && Storage::disk('public')->exists($produto->foto)){
            Storage::disk('public')->delete($produto->foto);
        }

        $produto->delete();

        return to_route('admin.menu')->with('message', 'Product deleted with sucess !!!');
    }
}
