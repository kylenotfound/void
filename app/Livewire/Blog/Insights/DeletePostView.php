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
        $this->postView->post->update(['view_count' => $this->postView->post->view_count -= 1]);
        $this->showModal = false;
        $this->dispatch('post-view-deleted');
    }
}
