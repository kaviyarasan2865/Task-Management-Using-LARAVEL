@section('content')
<div class="container mt-5">
    <h2>View Assigned Tasks</h2>
    @if(count($tasks) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Task Name</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)                    <tr>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->employee->employeeName }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary updateStatusBtn1" data-task-id="{{ $task->id }}">Update Status</button>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    @else
        <div class="alert alert-info"><br>No tasks assigned yet.</div>
    @endif
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(session('update'))
<div class="alert alert-success">
{{ session('update') }}
</div>
@endif
</div>


{{-- /////////////// --}}
{{-- update status --}}

<div id="updatestatus1" style="display:none;">

<div class="container mt-4">
<h2>Update Task Status</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="post" action="{{ route('tasks.updateStatus', ['id' => $task->id]) }}">
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

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.updateStatusBtn1').click(function() {
        var taskId = $(this).data('task-id');
        var updateStatusDiv = $('#updatestatus1');

        $.ajax({
            url: "{{ route('tasks.showUpdate', ['id' => ':id']) }}".replace(':id', taskId),
            type: 'GET',
            success: function(response) {
                updateStatusDiv.html(response); // Set the content of updatestatus div with the response
                updateStatusDiv.show(); // Show the updatestatus div
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error response
            }
        });
    });
});
</script>
