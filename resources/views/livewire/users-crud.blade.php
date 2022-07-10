<div>
    <div class="col-2">
        <input class="form-control" wire:model="search" type="text" placeholder="Search users..."/>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if($updateMode)
    @include('livewire.update-user')
@endif
 
    <table class="table table-striped">
        <caption>{{ $users->total() }} total users</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="#" wire:click="confirmDelete({{ $user->id}}, '{{ $user->name }}')" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash-can"></i></a> 
                        <a href="#" wire:click="edit({{ $user->id }})" data-toggle="modal" data-target="#exampleModal2"><i class="fa-solid fa-pen"></i></a> 
                        <a href="#"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
    {{ $users->withQueryString()->links() }}

    @includeWhen($deleteId != '', 'livewire.delete-confirmation-modal')


</div>
