
    <h1>Assign Task</h1>

    <form action="/assign_task" method="post">
        @csrf
        <label for="description">Task Description:</label>
        <input type="text" id="description" name="description" required><br>

        <label for="status">Task Status:</label>
        <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select><br>

        <label for="assigned_to">Assign To:</label>
        <select id="assigned_to" name="assigned_to" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Assign Task">
    </form>
