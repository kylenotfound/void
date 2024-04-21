<?php

namespace App\Livewire\Blog;

use App\Livewire\Helpers\WithSearchAndSort;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPostTable extends Component {
    use WithPagination;
    use WithSearchAndSort;

    public function mount() {
        $this->sortField = 'title';
        $this->searchOptions = [
            'title',
            'view_count',
            'created_at',
        ];
    }
    
    public function render() {
        return view('livewire.blog.blog-post-table', [
            'posts' => Post::query()
                ->searchAll($this->searchOptions, $this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->rowCount),
            'searchOptions' => $this->searchOptions
        ]);
    }
}
