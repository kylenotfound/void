<?php

namespace App\Livewire\Blog;

use App\Livewire\Helpers\WithModalActions;
use Livewire\Component;

class DeleteBlogPost extends Component {
    use WithModalActions;

    public function render() {
        return view('livewire.blog.delete-blog-post');
    }

    public function deletePost() {
        $this->deleteEntity();
    }
}
