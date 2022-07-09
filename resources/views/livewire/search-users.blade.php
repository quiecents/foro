<div>
    <div class="col-2">
        <input class="form-control" wire:model="search" type="text" placeholder="Search users..."/>
    </div>
 
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
                    <td><a href="#" data-toggle="modal" data-target="#exampleModal" wire:click="deleteId({{ $user->id }})"><i class="fa-solid fa-trash-can"></i></a> 
                        <a href="{{ route('admin.users.edit', [$user->id]) }}"><i class="fa-solid fa-pen"></i></a> 
                        <a href="{{ route('admin.users.show', [$user->id]) }}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
    {{ $users->withQueryString()->links() }}

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>

</div>