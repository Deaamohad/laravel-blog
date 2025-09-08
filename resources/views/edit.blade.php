@extends('layouts.app')

@section('title', 'Edit Post')

@section('main')

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content">Post Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="btn">Update Post</button>
            <a href="{{ route('posts.show', $post) }}" class="btn">Cancel</a>
        </div>    
    </form>
    

@endsection