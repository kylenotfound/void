<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\PostStoreRequest;
use App\Http\Requests\Blog\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller {

    public function index(): View {
        return view('blog.index');
    }

    public function create(): View {
        return view('blog.create');
    }

    public function store(PostStoreRequest $request): RedirectResponse {
        Post::create($request->all());

        return redirect(route('blog.index'));
    }

    public function show(string $slug): View {
        $post = Post::where('slug', $slug)->with('author')->first()->addView();

        return view('blog.show', ['post' => $post]);
    }

    public function edit(string $slug): View {
        $post = Post::where('slug', $slug)->firstOrFail();

        abort_if($post->user_id !== auth()->id(), 403);

        return view('blog.edit', ['post' => $post]);
    }

    public function update(PostUpdateRequest $request, string $key): RedirectResponse {
        Post::findOrFail($key)->update($request->all());

        return redirect(route('blog.index'))->with('success', 'Post updated successfully.');
    }
}
