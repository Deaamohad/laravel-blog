@extends('layouts.app')

@section('title', $post->title)

@section('main')

<div class="link"><a href="{{ route('posts.index') }}">Home Page</a></div>

<div class="mb-4">{{ $post->content }}</div>

<div class="flex justify-between items-center text-sm text-gray-500">
    <div>
        Posted at {{ $post->created_at->diffForHumans() }} • Updated at {{ $post->updated_at->diffForHumans() }}
    </div>

    <div class="flex gap-1">
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button class="btn">
                Delete post
            </button>
        </form>
        <a href="{{ route('posts.edit', $post) }}"
            <button class="btn">
                Edit post
            </button>
        </a>
    </div>
</div>

@endsection