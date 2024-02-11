<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>

    <h2>Your Tasks:</h2>
    @foreach($tasks as $task)
        <p>
            Task ID: {{ $task->id }}<br>
            Description: {{ $task->description }}<br>
            Status: {{ $task->status }}<br>

            <form action="/update_status/{{ $task->id }}" method="post">
                @csrf
                <label for="status">Update Status:</label>
                <select id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                <input type="submit" value="Update Status">
            </form>
        </p>
    @endforeach
</body>
</html>

