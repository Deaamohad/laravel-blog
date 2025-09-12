@extends('layouts.app')

@section('main')

<div class="link mb-4"><a href="{{ route('posts.index') }}">← Back to Posts</a></div>

<div class="mb-4 text-2xl text-blue-950">{{ $post->user->name }}</div>

<div class="text-3xl mb-4">{{ $post->title }}</div>

<div class="mb-4">{{ $post->content }}</div>

<div class="flex justify-between items-center text-sm text-gray-500">
    <div>
        Posted at {{ $post->created_at->diffForHumans() }} • Updated at {{ $post->updated_at->diffForHumans() }}
    </div>


    @auth
    @if (auth()->id() === $post->user_id)
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
    @endif
    @endauth

</div>

@endsection