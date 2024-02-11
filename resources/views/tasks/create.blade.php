<div class="container mt-5">
    <h2>Assign Task</h2>
    <div id="successMessage" style="display: none;" class="alert alert-success"></div>
    <form id="assignTaskForm" action="{{ route('tasks.assign') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" id="task_name" required>
        </div>
        <div class="form-group">
            <label for="employee_id">Assign to Employee</label>
            <select name="employee_id" class="form-control" id="employee_id" required>
                <option value="" disabled selected>Select Employee</option>
                @foreach($employees as $id => $employeeName)
                    <option value="{{ $id }}">{{ $employeeName }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" id="assignTaskBtn" class="btn btn-primary">Assign Task</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#assignTaskBtn').click(function(e) {
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $('#assignTaskForm').serialize();

            // Send AJAX request
            $.ajax({
                url: $('#assignTaskForm').attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Show success message
                    $('#successMessage').text('Task assigned successfully!');
                    $('#successMessage').show();

                    // Optional: Hide the form after successful submission
                    
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
