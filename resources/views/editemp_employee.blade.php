


<div class="container mt-5">
    <h1 class="text-center">Edit Employee</h1>
    <form method="post" action="{{ route('employees.updatedemp', ['id' => $employee->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeName">Employee Name</label>
                    <input type="text" class="form-control" id="employeeName" name="employeeName"
                        placeholder="Enter employee name" value="{{ $employee->employeeName }}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="employeeMobile">Mobile</label>
                    <input type="tel" class="form-control" id="employeeMobile" name="employeeMobile"
                        placeholder="Enter mobile number" value="{{ $employee->employeeMobile }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeEmail">Email</label>
                    <input type="email" class="form-control" id="employeeEmail" name="employeeEmail"
                        placeholder="Enter email" value="{{ $employee->employeeEmail }}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="employeeDOB">Date of Birth</label>
                    <input type="date" class="form-control" id="employeeDOB" name="employeeDOB" value="{{ $employee->employeeDOB }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeGender">Gender</label>
                    <select class="form-control" id="employeeGender" name="employeeGender" required>
                        <option value="male" @if($employee->employeeGender == 'male') selected @endif>Male</option>
                        <option value="female" @if($employee->employeeGender == 'female') selected @endif>Female</option>
                        <option value="other" @if($employee->employeeGender == 'other') selected @endif>Other</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="employeeDOJ">Date of Joining</label>
                    <input type="date" class="form-control" id="employeeDOJ" name="employeeDOJ" value="{{ $employee->employeeDOJ }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeAddress">Address</label>
                    <input type="text" class="form-control" id="employeeAddress" name="employeeAddress"
                        placeholder="Enter address" value="{{ $employee->employeeAddress }}" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="employeePassword">Password</label>
                    <input type="password" class="form-control" id="employeePassword" name="employeePassword"
                        placeholder="Enter password" value="{{ $employee->employeePassword }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeDesignation">Designation</label>
                    <input type="text" class="form-control" id="employeeDesignation" name="employeeDesignation"
                        placeholder="Enter designation" value="{{ $employee->employeeDesignation }}" required>
                </div>

                <div class="form-group">
                    <label for="employeeProfileImage">Profile Image</label>
                    @if ($employee->employeeProfileImage)
                        <img src="{{ asset('storage/' . $employee->employeeProfileImage) }}" alt="Current Profile Image"
                            class="img-thumbnail">
                        <p>Keep the existing image or upload a new one:</p>
                    @endif
                    <input type="file" class="form-control" id="employeeProfileImage" name="employeeProfileImage">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block">Update</button>
        </form>
    </div>

