<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;
use App\Models\EmployeeDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use stdClass;

class EmployeeDetailController extends Controller
{
    public function create()
    {

        return view('admin_dashboard');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'employeeName' => 'required|string|max:255',
            'employeeMobile' => 'required|string|max:20',
            'employeeEmail' => 'required|email|max:255',
            'employeeDOB' => 'required|date',
            'employeeGender' => 'required|string|max:255',
            'employeeDOJ' => 'required|date',
            'employeeAddress' => 'required|string|max:255',
            'employeePassword' => 'required|string|max:255',
            'employeeDesignation' => 'required|string|max:255',

        ], [
            'employeeName.required' => 'Employee Name is required.',
            'employeeMobile.required' => 'Mobile is required.',
            'employeeEmail.required' => 'Email is required.',
            'employeeEmail.email' => 'Please enter a valid email address.',
            'employeeDOB.required' => 'Date of Birth is required.',
            'employeeGender.required' => 'Gender is required.',
            'employeeDOJ.required' => 'Date of Joining is required.',
            'employeeAddress.required' => 'Address is required.',
            'employeePassword.required' => 'Password is required.',
            'employeeDesignation.required' => 'Designation is required.',
        ]);

        if ($request->hasFile('employeeProfileImage')) {
            $path = $request->file('employeeProfileImage')->store('images','public');
            $validatedData['employeeProfileImage'] = $path;
        }

        EmployeeDetail::create($validatedData);


        $userCredentials = [
            'email' => $validatedData['employeeEmail'],
            'password' => bcrypt($validatedData['employeePassword']), // Ensure to hash the password
        ];

        // Create user record
      User::create($userCredentials);

        return response()->json(['success' => true, 'message' => 'Employee added successfully!']);
    } catch (ValidationException $e) {
        $errors = $e->validator->errors()->all();
        return response()->json(['success' => false, 'errors' => $errors], 422);

    }
}

    public function showEmployeeDetails()
{
    $employees = EmployeeDetail::all();
    return view('employee_details', ['employees' => $employees])->with('success', 'Employee added successfully!');
}
public function edit($id)
    {
        $employee = EmployeeDetail::findOrFail($id);

        // Return the edit form view with the employee data
        return view('edit_employee', compact('employee'));
     }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employeeName' => 'required|string|max:255',
            'employeeMobile' => 'required|string|max:20',
            'employeeEmail' => 'required|email|max:255',
            'employeeDOB' => 'required|date',
            'employeeGender' => 'required|string|max:255',
            'employeeDOJ' => 'required|date',
            'employeeAddress' => 'required|string|max:255',
            'employeePassword' => 'required|string|max:255',
            'employeeDesignation' => 'required|string|max:255',
        ], [
            'employeeName.required' => 'Employee Name is required.',
            'employeeMobile.required' => 'Mobile is required.',
            'employeeEmail.required' => 'Email is required.',
            'employeeEmail.email' => 'Please enter a valid email address.',
            'employeeDOB.required' => 'Date of Birth is required.',
            'employeeGender.required' => 'Gender is required.',
            'employeeDOJ.required' => 'Date of Joining is required.',
            'employeeAddress.required' => 'Address is required.',
            'employeePassword.required' => 'Password is required.',
            'employeeDesignation.required' => 'Designation is required.',
        ]);

        if ($request->hasFile('employeeProfileImage')) {
            $path = $request->file('employeeProfileImage')->store('images', 'public');
            $validatedData['employeeProfileImage'] = $path;
        }


        EmployeeDetail::find($id)->update($validatedData);

        return redirect()->route('dash')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        EmployeeDetail::destroy($id);

        return redirect()->route('dash')->with('success', 'Employee deleted successfully.');
    }


    ////////
    public function showEmployee($id)
    {

        $employee = EmployeeDetail::find($id);


        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }

        return view('empdetails', ['employee' => $employee]);
    }

///
public function editemp($id)
    {
        $employee = EmployeeDetail::findOrFail($id);

        // Return the edit form view with the employee data
        return view('editemp_employee', compact('employee'));
     }


    //


    public function updatedemp(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employeeName' => 'required|string|max:255',
            'employeeMobile' => 'required|string|max:20',
            'employeeEmail' => 'required|email|max:255',
            'employeeDOB' => 'required|date',
            'employeeGender' => 'required|string|max:255',
            'employeeDOJ' => 'required|date',
            'employeeAddress' => 'required|string|max:255',
            'employeePassword' => 'required|string|max:255',
            'employeeDesignation' => 'required|string|max:255',
        ], [
            'employeeName.required' => 'Employee Name is required.',
            'employeeMobile.required' => 'Mobile is required.',
            'employeeEmail.required' => 'Email is required.',
            'employeeEmail.email' => 'Please enter a valid email address.',
            'employeeDOB.required' => 'Date of Birth is required.',
            'employeeGender.required' => 'Gender is required.',
            'employeeDOJ.required' => 'Date of Joining is required.',
            'employeeAddress.required' => 'Address is required.',
            'employeePassword.required' => 'Password is required.',
            'employeeDesignation.required' => 'Designation is required.',
        ]);

        if ($request->hasFile('employeeProfileImage')) {
            $path = $request->file('employeeProfileImage')->store('images', 'public');
            $validatedData['employeeProfileImage'] = $path;
        }

        EmployeeDetail::find($id)->update($validatedData);

        return redirect()->back();
    }

}




