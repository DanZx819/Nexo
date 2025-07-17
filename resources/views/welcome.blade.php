@extends('layout.app')

@section('title', 'Home')


@section('content')

    @if ($message = session('message'))
        <div  class="alert alert-error">
            {{ $message }}
        </div>
    @endif


    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Sign Up</a>
@endsection