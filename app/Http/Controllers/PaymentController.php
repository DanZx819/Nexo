<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{

    public function checkout_one(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0.01',
        ]);

        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

        $items = [
            [
                'title' => $request->titulo,
                'quantity' => (int) $request->quantidade,
                'unit_price' => (float) $request->preco,
                'currency_id' => 'BRL'
            ]
        ];

        $preferenceData = [
            'items' => $items,
            'back_urls' => [
                'success' => route('checkout.success'),
                'failure' => route('checkout.failure'),
                'pending' => route('checkout.pending'),
            ],
            //'auto_return' => 'approved',
        ];

        try {
            $client = new PreferenceClient();
            $preference = $client->create($preferenceData);
            return redirect($preference->init_point);
        } catch (MPApiException $e) {
            // Debug com resposta da API
            dd($e->getApiResponse()->getContent());
        }
    }


    public function checkout_cart()
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

        $cart = Cart::session(Auth::id())->getContent();

        

        $items = [];

        foreach ($cart as $item) {
            
            $items[] = [
                
                'title' => $item['name'],
                'quantity' => (int) $item['quantity'],
                'unit_price' => (float) $item['price'],
                'currency_id' => 'BRL'
            ];

        }
        
        $preferenceData = [
            'items' => $items,
            'back_urls' => [
                'success' => route('checkout.success'),
                'failure' => route('checkout.failure'),
                'pending' => route('checkout.pending'),
            ],
            //'auto_return' = 'approved';
        ];
        

        try {
            $client = new PreferenceClient();
            
            $preference = $client->create($preferenceData);
            return redirect($preference->init_point);
        } catch (MPApiException $e) {
            dd($e->getApiResponse()->getContent());
        }
    }


    public function success()
    {
        return 'Pagamento aprovado!';
    }

    public function failure()
    {
        return 'Pagamento falhou!';
    }

    public function pending()
    {
        return 'Pagamento pendente!';
    }
}
