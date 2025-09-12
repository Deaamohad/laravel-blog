@extends('layouts.app')

@section('title', 'Register')

@section('main')


<div></div>

<form action="/register" method="POST">
    @csrf
    <div>
        <label @error('name') class='text-red-600' @enderror for="name" >Username</label>
        <input @error('name') class="border-red-400" @enderror type="text" name="name" value="{{ old('name') }}" id="name">
        @error('name')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror

    </div>
    <div>
        <label @error('email') class="text-red-600" @enderror for="email" >Email</label>
        <input @error('email') class="border-red-400" @enderror type="text" name="email" value="{{ old('email') }}" id="email">
        @error('email')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror

    </div>
    <div>
        <label @error('password') class="text-red-600" @enderror for="password">Password</label>
        <input @error('password') class="border-red-400" @enderror type="password" name="password" id="password">
        @error('password')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror

    </div>
    <div>
        <label @error('password') class="text-red-600" @enderror for="password_confirmation">Password</label>
        <input @error('password') class="border-red-400" @enderror type="password" name="password_confirmation" id="password_confirmation">
        @error('password')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror

    </div>
    <div class="flex justify-between items-center">
        <button class="btn" type="submit">Register</button>
        <a href="/login" class="block link mt-4">Have an account?</a>
    </div>
</form>


@endsection