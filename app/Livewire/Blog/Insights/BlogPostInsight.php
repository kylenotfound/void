<?php

namespace App\Livewire\Blog\Insights;

use App\Livewire\Helpers\WithSearchAndSort;
use App\Models\Post;
use App\Models\PostView;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPostInsight extends Component {
    use WithPagination;
    use WithSearchAndSort;

    public $post;
    protected $listeners = ['postview-deleted' => '$refresh'];

    public function mount() {
        $this->post = Post::where('slug', request()->slug)->first();

        $this->sortField = 'created_at';
        $this->searchOptions = [
            'ip',
            'username',
            'post_views.created_at',
        ];
    }

    public function render() {
        return view('livewire.blog.insights.blog-post-insight-table', [
            'viewers' => PostView::query()
                ->select('post_views.*', 'users.username')
                ->join('users', 'users.id', 'post_views.user_id')
                ->where('post_id', $this->post->getKey())
                ->searchAll($this->searchOptions, $this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->rowCount)
        ]);
    }
}
