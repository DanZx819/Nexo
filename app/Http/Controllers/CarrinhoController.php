<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        $itens = Cart::session(Auth::id())->getContent();
        return view('cart.index', compact('itens'));
    }

    public function adicionar(Request $request)
    {
        $produto = Produto::findOrFail($request->id);
        
        $quantidade = $request->validate([
             'product_quantity' => 'required|numeric|min:1|max:' . $produto->quantidade,
        ]);
        $quantidade = (int) $request->input('product_quantity');

        Cart::session(Auth::id())->add([
            'id' => $produto->id,
            'name' => $produto->titulo,
            'price' => $produto->preco,
            'quantity' => $quantidade,
            'attributes' => [
                'foto' => $produto->foto
            ]
        ]);

        return redirect()->route('cart.index')->with('message', 'Produto adicionado ao carrinho!');
    }

    public function remover($id)
    {

        Cart::session(Auth::id())->remove($id);


        return redirect()->route('cart.index')->with('message', 'Produto removido!');
    }

    public function limpar()
    {
        Cart::session(Auth::id())->clear();

        return redirect()->route('cart.index')->with('message', 'Carrinho esvaziado!');
    }
}
