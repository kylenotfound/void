<?php

namespace App\Livewire\Blog\Insights;

use App\Livewire\Helpers\WithModalActions;
use Livewire\Component;

class DeletePostView extends Component {
    use WithModalActions;

    public function render() {
        return view('livewire.blog.insights.delete-post-view');
    }

    public function deletePostView() {
        $this->entity->post->update(['view_count' => $this->entity->post->view_count -= 1]);
        $this->deleteEntity();
    }
}
