<?php

namespace App\Livewire\Users;

use App\Livewire\Helpers\WithSearchAndSort;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManager extends Component {
    use WithPagination;
    use WithSearchAndSort;

    public function mount() {
        $this->sortField = 'created_at';
        $this->searchOptions = [
            'username',
            'email',
            'socialite_types.name',
            'timezone',
            'users.created_at'
        ];
    }

    public function render() {
        return view('livewire.users.user-manager', [
            'users' => User::query()
                ->select('users.id', 'username', 'email', 'avatar', 'users.created_at', 'socialite_types.name AS type')
                ->leftjoin('socialite_connections', 'socialite_connections.user_id', 'users.id')
                ->leftjoin('socialite_types', 'socialite_connections.socialite_type_id', 'socialite_types.id')
                ->searchAll($this->searchOptions, $this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->rowCount),
        ]);
    }
}
