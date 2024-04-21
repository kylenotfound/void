<?php

namespace App\Livewire\Helpers;

trait WithSearchAndSort {

    public string $search = '';
    public array $searchOptions = [];

    public string $sortField = '';
    public string $sortDirection = 'asc';
    public int $rowCount = 5;

    function sortBy($field) {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }
}