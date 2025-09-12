@extends('layouts.app')

@section('title', 'Login')

@section('main')


@error('invalid_credentials')
    <div class='error'>
        {{ $message }}
    </div>
@enderror


<form action="/login" method="POST">
    @csrf
    <div>
        <label @error('email') class="text-red-600" @enderror for="email" >Email</label>
        <input @error('email') class='border-red-400' @enderror type="text" name="email" value="{{ old('email') }}" id="email">
        @error('email')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label @error('password') class="text-red-600" @enderror for="password">Password</label>
        <input @error('password') class='border-red-400' @enderror type="password" name="password" id="password">
        @error('password')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror

    </div>
    <div class="flex justify-between items-center">
        <button class="btn" type="submit">Login</button>
        <a href="/register" class="block link mt-4">Don't have an account?</a>
    </div>
</form>


@endsection