<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pesquisa = request('search');

        if ($pesquisa) {
            $produtos = Produto::where([
                ['titulo', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }
        

        return view('admin.menu', compact('produtos', 'pesquisa'));
    }

    
}
