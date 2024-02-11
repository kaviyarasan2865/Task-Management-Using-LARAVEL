<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class UpdateTaskController extends Controller
{
    public function showUpdateForm($id)
    {
        $task = Task::findOrFail($id);
        return view('updateTask', ['task' => $task]);
    }

    public function updateTaskStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:pending,process,finished',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task status
        $task->status = $request->input('status');
        $task->save();

        // Redirect back with a success message
        return redirect()->route('dash')->with('update', 'Task status updated successfully');
    }

    public function updateTaskStatusemp(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:pending,process,finished',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task status
        $task->status = $request->input('status');
        $task->save();

        // Redirect back with a success message
        return redirect()->back();
    }
}
