<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        if ($request->registerUser()) {
            return to_route('login')->with('message', 'Registro Efetuado com Sucesso !');
        }
        
        
    }
}
