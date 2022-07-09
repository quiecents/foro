<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersCrud extends Component
{
    use WithPagination;
    
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $deleteId;
    public $userName = '';

    public function render()
    {
        return view('livewire.users-crud', [
            'users' => User::where('name', 'LIKE', "%{$this->search}%")->paginate(15),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id, $userName)
    {
        $this->deleteId = $id;
        $this->userName = $userName;
    }

    public function delete()
    {
        User::destroy($this->deleteId);
    }
}
