@extends('layouts.app')

@section('title', $post->title)

@section('header')
    <div class="flex items-center justify-between">
        <a href="{{ route('posts.index') }}" class="btn-outline">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Posts
        </a>
        
        @auth
            @if (auth()->id() === $post->user_id)
                <div class="flex space-x-3">
                    <a href="{{ route('posts.edit', $post) }}" class="btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Post
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" 
                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Post
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
@endsection

@section('main')
    <article class="card">
        <div class="card-header">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-semibold">
                            {{ substr($post->user->name, 0, 1) }}
                        </span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                        <div class="post-meta">
                            <time>Published {{ $post->created_at->diffForHumans() }}</time>
                            @if($post->created_at != $post->updated_at)
                                <span class="text-gray-400">•</span>
                                <time>Updated {{ $post->updated_at->diffForHumans() }}</time>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <h1 class="text-3xl font-bold text-gray-900 mb-6 break-words">{{ $post->title }}</h1>
            
            <div class="prose prose-lg max-w-none">
                <div class="post-content whitespace-pre-line break-words overflow-wrap-anywhere">{{ $post->content }}</div>
            </div>
        </div>
    </article>
@endsection