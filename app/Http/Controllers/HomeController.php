<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller {
    public function __invoke() {
        return view('home', [
            'posts' => Post::query()
                ->select('user_id', 'title', 'slug', 'created_at', 'view_count')
                ->with('author')
                ->latest()
                ->get()
        ]);
    }
}
