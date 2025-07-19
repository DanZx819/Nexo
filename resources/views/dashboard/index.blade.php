@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

    @if ($message = session('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div>
        <h1>Bem vindo {{ auth()->user()->name }}</h1>
        <br>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-error text-white">Logout</button>
        </form>

        <br>


        @if (auth()->user()->is_admin)
            <div>
               <a href="{{ route('admin.menu') }}" class="btn btn-warning text-white">Menu Admin</a>
            </div>
            <br>
            <div>
                <a href="{{ route('create.index') }}" class="btn btn-info text-white">Make a product</a>
            </div>
            <br>
        @endif
    </div>

    @foreach ($produtos as $produto)
        <div class="card bg-base-100 w-96 shadow-sm">
            
            <figure>
                <img src="{{$produto->foto}}" alt="{{ $produto->titulo }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $produto->titulo }}</h2>
                <p>{{ $produto->descricao }}</p>
                <p>${{ $produto->preco }}</p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{ route('produtos.show', $produto) }}">Buy Now</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
