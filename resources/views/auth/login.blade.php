@extends('layout.app')
@section('title', 'Login')
@section('content')
    
   @if ($message = session('logout'))
       <div role="alert" class="alert alert-error mt-5 mb-5">
            {{ $message }}
        </div>
   @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        

        <label for="email">Email</label>

        <input class="input input-primary" type="email" name="email" required>

        <label for="password">Password:</label>
        
        <input class="input input-primary" type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    
@endsection