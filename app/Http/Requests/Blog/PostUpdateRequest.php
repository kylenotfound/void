<?php

namespace App\Http\Requests\Blog;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest {

    public function authorize(): bool {
        return auth()->check() && Post::findOrFail(request()->route('blog'))->user_id === auth()->id();
    }

    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }
}
