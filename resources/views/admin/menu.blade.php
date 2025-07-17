@extends('layout.app')

@section('title', 'Admin Menu')

@section('content')
    @foreach ($produtos as $produto)
        <ul class="list bg-base-100 rounded-box shadow-md">



            <li class="list-row">
                <div><img class="size-10 rounded-box" src="{{ $produto->foto }}" /></div>
                <div>
                    <div class="text-xs uppercase font-semibold opacity-60">{{ $produto->titulo }}</div>
                    <div>{{ $produto->descricao }}</div>
                </div>
                <button class="btn btn-square btn-ghost">
                    <x-heroicon-s-pencil class="w-6 h-6 text-yellow-500" />
                </button>

                <form action="{{ route('product.delete', $produto) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-square btn-ghost">
                        <x-heroicon-s-trash class="w-6 h-6 text-red-600" />
                    </button>
                </form>


            </li>
        </ul>
    @endforeach
@endsection
