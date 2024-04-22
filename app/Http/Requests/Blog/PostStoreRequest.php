<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest {

    public function authorize(): bool {
        return auth()->check();
    }

    public function rules(): array {
        return [
            'title' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }
}
