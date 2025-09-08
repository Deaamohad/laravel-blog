@extends('layouts.app')

@section('title', 'Create a Post')

@section('main')

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Post Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="content">Post Content</label>
        <textarea name="content" id="content" cols="30" rows="10" required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn">Create Post</button>
</form>

@endsection