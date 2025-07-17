@extends('layout.app')
@section('title', 'Register')
@section('content')
    
   @if ($message = session('message'))
       <div class="alert alert-success">
            {{$message}}
        </div>
   @endif
    <form action="{{ route('registro') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input class="input input-primary" type="text" name="name" required>

        <label for="email">Email</label>
        <input class="input input-primary" type="email" name="email" required>
        <label for="password">Password:</label>
        <input class="input input-primary" type="password" name="password" required>
        <label for="password_confirmation">Confirmed Passoword:</label>
        <input class="input input-primary" type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>
    
@endsection