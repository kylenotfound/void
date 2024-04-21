<?php

namespace App\Livewire\Blog\Insights;

use App\Models\PostView;
use Livewire\Component;

class DeletePostView extends Component {
    public $showModal = false;
    public PostView $postView;

    public function mount($postView) {
        $this->postView = $postView;
    }

    public function render() {
        return view('livewire.blog.insights.delete-post-view');
    }

    public function deletePostView() {
        $this->postView->delete();
        $this->showModal = false;
        $this->dispatch('post-view-deleted');
    }
}
