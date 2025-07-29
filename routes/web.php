<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['guest'])->group(function () {
    //Rotas de Registro
    Route::get('/register', RegisterController::class)->name('register');

    Route::post('/register', [RegisterController::class, 'register'])->name('registro');

    //Rotas de Login

    Route::get('/login', LoginController::class)->name('login');

    Route::post('/login', [LoginController::class, 'loginIn'])->name('login-in');
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/produtos/{produto}', [ProductController::class, 'show'])->name('produtos.show');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/cart', [CarrinhoController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CarrinhoController::class, 'adicionar'])->name('cart.add');
    Route::delete('/cart/remover/{id}', [CarrinhoController::class, 'remover'])->name('cart.remover');
    Route::delete('/cart/limpar', [CarrinhoController::class, 'limpar'])->name('cart.limpar');


    Route::post('/checkout', [PaymentController::class, 'checkout_one'])->name('checkout');

    Route::post('/cart/checkout', [PaymentController::class, 'checkout_cart'])->name('checkout.cart');

    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/failure', [PaymentController::class, 'failure'])->name('checkout.failure');
    Route::get('/checkout/pending', [PaymentController::class, 'pending'])->name('checkout.pending');
});

Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('create.index');

    Route::post('/product/create', [ProductController::class, 'store'])->name('store.product');

    Route::get('/menu', AdminController::class)->name('admin.menu');

    Route::get('edit/{produto}', [ProductController::class, 'edit'])->name('edit.product');

    Route::post('edit/update', [ProductController::class, 'update'])->name('update.product');

    Route::delete('/producos/delete/{produto}', [ProductController::class, 'destroy'])->name('product.delete');
});
