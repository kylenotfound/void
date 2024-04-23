<?php

namespace App\Livewire\Helpers;

trait WithModalActions {
    public $showModal = false;
    public $entity;

    public function mount($entity) {
        $this->entity = $entity;
    }

    public function deleteEntity() {
        $this->entity->delete();
        $this->showModal = false;
        $this->dispatch(strtolower(class_basename($this->entity)) . '-deleted');
    }
}