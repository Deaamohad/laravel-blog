@extends('layouts.app')

@section('title', 'Create Account')

@section('header')
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-900">Join Our Community</h1>
        <p class="mt-2 text-gray-600">Create your account to start sharing your thoughts</p>
    </div>
@endsection

@section('main')
    <div class="max-w-md mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('auth.register') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="form-label">
                            Full Name
                            <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            class="form-input @error('name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                            placeholder="Enter your full name"
                            required
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                            placeholder="Create a secure password"
                            required
                        >
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
                            <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="form-input" 
                            placeholder="Confirm your password"
                            required
                        >
                    </div>

                    <button type="submit" class="w-full btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Create Account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection