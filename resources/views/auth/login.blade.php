@extends('layouts.app')

@section('title', 'Sign In')

@section('header')
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-900">Welcome Back</h1>
        <p class="mt-2 text-gray-600">Sign in to your account to continue</p>
    </div>
@endsection

@section('main')
    <div class="max-w-md mx-auto">
        <div class="card">
            <div class="card-body">
                @error('invalid_credentials')
                    <div class="alert-error mb-6">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="form-label">
                            Email Address
                            <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            class="form-input @error('email') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                            placeholder="Enter your email address"
                            required
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="form-label">
                            Password
                            <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-input @error('password') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                            placeholder="Enter your password"
                            required
                        >
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Sign In
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Create one here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection