<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\EmployeeDetail;

class TaskController extends Controller
{
    public function createTaskForm()
    {
        $employees = EmployeeDetail::pluck('employeeName', 'id');
        return view('tasks.create', compact('employees'));
    }

    public function assignTask(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'employee_id' => 'required'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.view')->with('success', 'Task assigned successfully');
    }

    public function viewAssignedTasks()
{
    $tasks = Task::with('employee')->get(); // Assuming you have a relationship set up in the Task model

    return view('tasks.view', compact('tasks'));
}
public function showUpdateForm($id)
{
    $task = Task::find($id);
    return view('UpdateTask', ['task' => $task]);
}
public function delete($id)
{
    $task = Task::find($id);

    if (!$task) {
        return redirect()->route('tasks.view')->with('error', 'Task not found');
    }

    $task->delete();

    return redirect()->route('dash')->with('success', 'Task deleted successfully');
}

public function tasksForEmployee($employeeId)
    {
        // Fetch tasks for a specific employee with the new relationship method
        $tasks = Task::with('assignee')->where('employee_id', $employeeId)->get();

        // Return the tasks to the view
        return view('tasks.index', compact('tasks'));
    }


///////

    public function showTask($employeeid)
    {
        $tasks = Task::where('employee_id', $employeeid)->get();

        return view('taskdetails', compact('tasks'));
    }

    public function showUpdate($id)
{
    $task = Task::find($id);
    return view('updatetaskemp', ['task' => $task]);
}

}
