@extends('layouts.app')

@section('title', 'Login')

@section('main')


<div></div>

<form action="/login" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div class="flex justify-between items-center">
        <button class="btn" type="submit">Login</button>
        <a href="/register" class="block link mt-4">Don't have an account?</a>
    </div>
</form>


@endsection