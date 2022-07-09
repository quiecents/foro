<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class SearchUsers extends Component
{
    use WithPagination;
    
    public $deleteId = '';
    public $search = '';
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::where('name', 'LIKE', "%{$this->search}%")->paginate(15),
        ]);
    }


    public function deleteId($deleteId)
    {
        $this->deleteId = $deleteId;
    }

    public function delete()
    {
        User::findOrFail($this->deleteId)->delete();
    }
}
