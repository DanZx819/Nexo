@extends('layout.app')

@section('title', $produto->titulo)

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <div class="card bg-base-100 shadow">
        <figure>
            <img src="{{ asset('storage/' . $produto->foto) }}" alt="{{ $produto->titulo }}" />
        </figure>
        <div class="card-body">
            <h2 class="card-title text-2xl">{{ $produto->titulo }}</h2>
            <p class="mb-2">{{ $produto->descricao }}</p>
            <p class="text-lg font-bold">${{$produto->preco}}</p>
            <div class="card-actions justify-end mt-4">
                <a class="btn btn-success" href="#">Buy</a>
                <a class="btn btn-outline" href="{{ route('dashboard') }}">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
