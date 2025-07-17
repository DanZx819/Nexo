@extends('layout.app')

@section('title', 'Make Product')


@section('content')
<div class="flex justify-center items-center min-h-screen">

    
    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data" class="flex flex-col w-3/12 space-y-2">
        @csrf
        <h1 class="text-xl">Create a new Product</h1>

        

        <input type="text" name="titulo" required class="input input-info" placeholder="Title">

        <input type="text" name="descricao" required class="input input-info" placeholder="Description">

        <input type="number" name="preco" step="0.01" required class="input input-info" placeholder="Price">

        <input type="file" name="foto" required class="file-input file-input-info">

        <button type="submit" class="btn btn-outline btn-info w-25 hover:text-white">Create</button>
    </form>
</div>

@endsection