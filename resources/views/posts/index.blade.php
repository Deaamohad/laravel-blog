@extends('layouts.app')

@section('title', 'Latest Posts')

@section('header')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Latest Posts</h1>
            <p class="mt-2 text-gray-600">Discover amazing content from our community</p>
        </div>
        @auth
            <a href="{{ route('posts.create') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create New Post
            </a>
        @endauth
    </div>
@endsection

@section('main')
    @if($posts->count() > 0)
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-1">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post) }}" class="block">
                    <article class="post-card cursor-pointer overflow-hidden">
                        <div class="card-body">
                            <div class="flex items-start justify-between">
                                <div class="flex-1 min-w-0">
                                    <div class="post-meta mb-3">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                <span class="text-blue-600 font-medium text-sm">
                                                    {{ substr($post->user->name, 0, 1) }}
                                                </span>
                                            </div>
                                            <span class="ml-2 font-medium text-gray-900 break-words">{{ $post->user->name }}</span>
                                        </div>
                                        <span class="text-gray-400">•</span>
                                        <time class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                                    </div>
                                    
                                    <h2 class="post-title mb-3 break-words overflow-wrap-anywhere word-break-break-word">
                                        {{ $post->title }}
                                    </h2>
                                    
                                    <p class="post-content text-gray-600 line-clamp-3 break-words overflow-wrap-anywhere word-break-break-word">
                                        {{ Str::limit($post->content, 150) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet</h3>
            <p class="text-gray-500 mb-6">Be the first to share your thoughts with the community!</p>
            @auth
                <a href="{{ route('posts.create') }}" class="btn-primary">
                    Create Your First Post
                </a>
            @else
                <a href="{{ route('register') }}" class="btn-primary">
                    Join to Start Writing
                </a>
            @endauth
        </div>
    @endif
@endsection