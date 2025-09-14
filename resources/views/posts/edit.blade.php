@extends('layouts.app')

@section('title', 'Edit Post')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Post</h1>
            <p class="mt-2 text-gray-600">Make changes to your post</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('posts.show', $post) }}" class="btn-outline">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Post
            </a>
        </div>
    </div>
@endsection

@section('main')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="form-label">
                        Post Title
                        <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title', $post->title) }}" 
                        class="form-input @error('title') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                        placeholder="Enter a compelling title for your post"
                        required
                    >
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="form-label">
                        Post Content
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="12" 
                        class="form-textarea @error('content') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                        placeholder="Write your post content here..."
                        required
                    >{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a href="{{ route('posts.show', $post) }}" class="btn-outline">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

