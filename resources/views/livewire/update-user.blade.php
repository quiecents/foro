<!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">    
                    <h5 class="modal-title" id="exampleModal2Label">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>    
                    </button>
                </div>
                <div class="modal-body">    
                    <form>
                        <div class="form-group">
                          <label for="name" class="col-form-label">Name:</label>
                          <input type="text" class="form-control" id="name" wire:model="userEditName">
                          @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" wire:model="userEditEmail">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                      </form>
                </div>
                    <div class="modal-footer">    
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-danger close-btn" data-dismiss="modal">Cancel</button>
                        <button type="button" wire:click.prevent="update()" class="btn btn-dark close-modal" data-dismiss="modal">Update</button>
                    </div>    
            </div>
        </div>
    </div>