
<div class="container mt-5">
        <h1 class="text-center">Employee Details</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date of Joining</th>
                        <th scope="col">Address</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td>{{ $employee->employeeName }}</td>
                        <td>{{ $employee->employeeMobile }}</td>
                        <td>{{ $employee->employeeEmail }}</td>
                        <td>{{ $employee->employeeDOB }}</td>
                        <td>{{ $employee->employeeGender }}</td>
                        <td>{{ $employee->employeeDOJ }}</td>
                        <td>{{ $employee->employeeAddress }}</td>
                        <td>{{ $employee->employeeDesignation }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $employee->employeeProfileImage) }}" alt="Profile Image" class="img-thumbnail">
                        </td>
                        <!-- Update the last <td> in each row -->
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('employees.editemp', ['id' => $employee->id]) }}" id="editEmployeeBtn1" class="btn btn-primary">Edit</a>

                            <!-- Delete button
                            <form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form> -->
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
    @if (session('success'))
    <div class="alert alert-success" style="color:red;">
        {{ session('success') }}
    </div>
    @endif




    {{-- edit employee --}}


<div id="editemployee1" style="display:none;">
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
</div>



    <script>
        $(document).ready(function () {
            // Event listener for "Edit" button
            $("body").on("click", "#editEmployeeBtn1", function (e) {
                e.preventDefault();
                var url = $(this).attr("href");

                // Ajax request to load the content of the editemployee section
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        // Replace the content of the editemployee container with the loaded content
                        $("#editemployee1").html(data).show();
                        // Hide the employee details table

                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>


