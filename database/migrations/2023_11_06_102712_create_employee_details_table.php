<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->string('employeeName');
            $table->string('employeeMobile');
            $table->string('employeeEmail');
            $table->date('employeeDOB');
            $table->date('employeeDOJ');
            $table->string('employeeAddress');
            $table->string('employeePassword');
            $table->string('employeeDesignation');
            $table->binary('employeeProfileImage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_details');
    }
}
