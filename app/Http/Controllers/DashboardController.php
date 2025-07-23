<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pesquisa = request('pesquisa');

        if ($pesquisa) {
            $produtos = Produto::where([
                ['titulo', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }
        return view('dashboard.index', compact('produtos', 'pesquisa'));

        

    }
}
