<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('auth.login');
    }


    public function loginIn(LoginRequest $request){
        if($request->tryTologin()){

            $user = Auth::user();

            return to_route('dashboard')->with('message', 'Bem vindo '.$user->name);

        }

        return back()->with('message', 'Email ou senhas estão errados !');
    }

    public function logout(){
        $user = Auth::user();

        Auth::logout($user);

        session()->invalidate();

        return to_route('login')->with('logout', 'Você foi deslogado !');

    }
}
