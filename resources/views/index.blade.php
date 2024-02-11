<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Tasks Assigned to Employee</title>
</head>
<body>

    <h1>Tasks Assigned to Employee</h1>

    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->title }} - Assigned to: {{ $task->assignee->name }}</li>
        @endforeach
    </ul>

</body>
</html>
