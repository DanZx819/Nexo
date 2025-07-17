@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

    @if ($message = session('message'))
       <div class="alert alert-success">
            {{$message}}
        </div>
   @endif

   <div>
      <h1>Bem vindo {{ auth()->user()->name }}</h1>
      <br>
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-error text-white">Logout</button>
      </form>
   </div>

@endsection