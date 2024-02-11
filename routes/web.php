<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeDetailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UpdateTaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeDashboardController;



//adding new employee
Route::get('/admin_dashboard', [EmployeeDetailController::class, 'create'])->name('employees.i');
Route::post('/admin_dashboard', [EmployeeDetailController::class, 'store']);

//Showing employee details
Route::get('/employee-details', [EmployeeDetailController::class, 'showEmployeeDetails'])->name('employees.index');

//Editing, updating, and deleting employee details
Route::get('/employee-details/{id}/edit', [EmployeeDetailController::class, 'edit'])->name('employees.edit');
Route::put('/employee-details/{id}', [EmployeeDetailController::class, 'update'])->name('employees.update');
Route::delete('/employee-details/{id}', [EmployeeDetailController::class, 'destroy'])->name('employees.destroy');

//Task management
Route::get('/tasks/create', [TaskController::class, 'createTaskForm'])->name('tasks.create.form');
Route::post('/tasks/assign', [TaskController::class, 'assignTask'])->name('tasks.assign');
Route::get('/tasks/view', [TaskController::class, 'viewAssignedTasks'])->name('tasks.view');

//Employee Task status
Route::get('/tasks/{id}/update-form', [UpdateTaskController::class, 'showUpdateForm'])->name('tasks.showUpdateForm');
Route::put('/tasks/{id}/update-status', [UpdateTaskController::class, 'updateTaskStatus'])->name('tasks.updateStatus');

//Admin task status
Route::get('/tasks/update/{id}', [TaskController::class, 'showUpdateForm'])->name('tasks.showUpdateForm');
Route::delete('/tasks/delete/{id}', [TaskController::class,'delete'])->name('tasks.delete');
Route::get('/tasks/{employeeId}', [TaskController::class, 'tasksForEmployee']);

//dashboard views
route::view('/d','dash')->name('dash');

route::view('/empdash','empdash')->name('empdash');

//Login
Route::get('/', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/', [AuthController::class,'login']);



//employee  dashboard routes details
Route::get('/employee/dashboard', [EmployeeDashboardController::class,'index'])->name('employee.dashboard');
Route::get('/employee/{id}', [EmployeeDetailController::class, 'showEmployee'])->name('employees.id');
Route::get('/employee-details/{id}/editemp', [EmployeeDetailController::class, 'editemp'])->name('employees.editemp');
Route::put('/updatedemp/{id}', [EmployeeDetailController::class, 'updatedemp'])->name('employees.updatedemp');


//employee  dashboard routes task
Route::get('/employee.task/{id}', [TaskController::class, 'showTask'])->name('employees.id');
Route::get('/tasks/updatetask/{id}', [TaskController::class, 'showUpdate'])->name('tasks.showUpdate');
Route::put('/tasks/{id}/update-statusemp', [UpdateTaskController::class, 'updateTaskStatusemp'])->name('tasks.updateStatusemp');
