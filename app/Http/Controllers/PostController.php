<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    
    public function index(Request $request) {
        $query = Post::latest();
        if ($request->has('search') && $request->search != '') {
            $query->title($request->search);
        }
        $posts = $query->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post) {

        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Auth::user()->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully!');

        
    }

    public function edit(Post $post) {

        try {
            $this->authorize('update', $post);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('posts.index')
                ->with('error', 'You are not allowed to edit this post.');
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only(['title', 'content']));

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }
}
