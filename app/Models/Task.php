<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['task_name', 'employee_id'];
    // app/Task.php

public function employee()
{
    return $this->belongsTo(EmployeeDetail::class, 'employee_id');
}

public function assignee()
    {
        return $this->belongsTo(EmployeeDetail::class, 'employee_id');
    }
}
