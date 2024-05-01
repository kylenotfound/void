<?php

namespace App\Livewire\Blog;

use App\Livewire\Helpers\WithSearchAndSort;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPostTable extends Component {
    use WithPagination;
    use WithSearchAndSort;

    protected $listeners = ['post-deleted' => '$refresh'];

    public function mount() {
        $this->sortField = 'created_at';
        $this->searchOptions = [
            'title',
            'view_count',
            'created_at',
        ];
    }
    
    public function render() {
        return view('livewire.blog.blog-post-table', [
            'posts' => Post::query()
                ->select('id', 'user_id', 'title', 'slug', 'created_at', 'view_count')
                ->where('user_id', auth()->id())
                ->searchAll($this->searchOptions, $this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->rowCount),
            'searchOptions' => $this->searchOptions
        ]);
    }
}
