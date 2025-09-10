@extends('layouts.app')

@section('title', 'Create a Post')

@section('main')

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title" @error('title') class='text-red-600' @enderror >Post Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" @error('title') class='border-red-400' @enderror required>
        @error('title')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="content" @error('content') class='text-red-600' @enderror>Post Content</label>
        <textarea name="content" id="content" cols="30" rows="10" @error('content') class='border-red-400' @enderror required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-red-400 text-sm mt-1 mb-3">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-2 mt-4">
        <button type="submit" class="btn">Create Post</button>
        <a href="{{ route('posts.index') }}" class="btn">Cancel</a>
    </div>    

</form>

@endsection