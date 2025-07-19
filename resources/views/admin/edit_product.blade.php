@extends('layout.app')

@section('title', 'Edit Product')

@section('content')
    <div class="flex justify-center items-center min-h-screen">

        <figure>
            <img src="{{ asset('storage/' . $produto->foto) }}" alt="{{ $produto->titulo }}" class="w-50 rounded">

        </figure>
        <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data"
            class="flex flex-col w-3/12 space-y-2">
            @csrf
            <h1 class="text-xl">Edit a Product</h1>

            <input type="hidden" name="id" value="{{ $produto->id }}">


            <input type="text" name="titulo" class="input input-info" placeholder="Title"
                value="{{ $produto->titulo }}">

            <input type="text" name="descricao" class="input input-info" placeholder="Description"
                value="{{ $produto->descricao }}">

            <input type="number" name="preco" step="0.01" required class="input input-info" placeholder="Price"
                value="{{ $produto->preco }}">

            <input type="file" name="foto" class="file-input file-input-info">

            <div class="flex justify-start space-x-2">
                <button type="submit" class="btn btn-outline btn-info w-25 hover:text-white">Edit</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline w-25">Back</a>
            </div>
        </form>
    </div>
@endsection
