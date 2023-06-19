<div class="modal fade" id="delete-user-{{ $user->id }}">
    <div class="modal-dialog">
        <form action="{{ route('user.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-trash-can me-1"></i> Delete user
                    </h3>
                </div>
                <div class="modal-body fw-bold">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ $user->name }}</span> user?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>