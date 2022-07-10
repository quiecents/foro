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
    public $deleteId = '';
    public $userName = '';
    public $userEditName = ''; 
    public $userEditEmail = '';
    public $editId = '';
    public $updateMode = false;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->editId = $id;
        $this->userEditName = $user->name;
        $this->userEditEmail = $user->email;
  
        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->userEditName = '';
        $this->userEditEmail = '';
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedUser = $this->validate([
            'userEditName' => 'required',
            'userEditEmail' => 'required',
        ]);
  
        $user = User::find($this->editId);
        $user->update([
            'name' => $this->userEditName,
            'email' => $this->userEditEmail,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'User Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete()
    {
        User::destroy($this->deleteId);
    }
}
