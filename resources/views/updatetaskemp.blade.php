
<div class="container mt-4">
    <h2>Update Task Status1</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('tasks.updateStatusemp', ['id' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Task Status:</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="process" {{ $task->status === 'process' ? 'selected' : '' }}>In Process</option>
                <option value="finished" {{ $task->status === 'finished' ? 'selected' : '' }}>Finished</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

