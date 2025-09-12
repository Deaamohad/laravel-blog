@extends('layouts.app')

@section('title', 'Blogs List')

@section('main')
    
@auth
    <div class="link"><a href="{{ route('posts.create') }}">Create a Post</a></div>
@endauth

<div class="flex flex-wrap gap-4">
    @foreach ($posts as $post)
    <a href="{{ route('posts.show', $post) }}" 
    class="flex-1 min-w-[calc(50%-0.5rem)] border p-4 rounded-2xl
     ring-gray-500 hover:bg-gray-100 cursor-pointer block">
        <div class="text-blue-950 text-lg">
            {{$post->user->name}}
        </div>
        <div class="text-[19px]">
            {{ $post->title }}
         </div>
    </a>  
    @endforeach
</div>
@endsection