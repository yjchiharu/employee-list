<div class="modal fade" id="user-more-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h2 class="h5 modal-title text-success">
                    <i class="fa-solid fa-user me-3"></i> User Details
                </h2>
            </div>

            <div class="modal-body">
                <p class="mb-3">Employee ID: {{ $user->id }}</p>
                <p class="mb-3">Employee Name: {{ $user->name }}</p>
                <p class="mb-3">Employee Department: {{ $user->department }}</p>
                <p class="mb-3">Employee Salary: {{ $user->salary }}</p>
                <p class="mb-3">Employee Email: {{ $user->email }}</p>
                <p class="mb-3">Joined Date: {{ $user->created_at }}</p>
            </div>

            <div class="modal-footer border-0">
                <a  href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning btn-sm me-2"><i class="fa-solid fa-pen"></i>Edit</a>
                <button class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


