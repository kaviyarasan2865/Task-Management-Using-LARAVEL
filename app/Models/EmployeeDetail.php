<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class EmployeeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'employeeName',
        'employeeMobile',
        'employeeEmail',
        'employeeDOB',
        'employeeDOJ',
        'employeeAddress',
        'employeePassword',
        'employeeDesignation',
        'employeeProfileImage',
        'imageUpload',
    ];
}
