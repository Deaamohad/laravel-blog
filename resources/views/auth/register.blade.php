@extends('layouts.app')

@section('title', 'Register')

@section('main')


<div></div>

<form action="/register" method="POST">
    @csrf
    <div>
        <label for="name">Username</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password_confirmation">Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    <div class="flex justify-between items-center">
        <button class="btn" type="submit">Register</button>
        <a href="/register" class="block link mt-4">Don't have an account?</a>
    </div>
</form>


@endsection