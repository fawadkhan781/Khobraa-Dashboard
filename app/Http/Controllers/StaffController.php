<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $data = Staff::paginate(4);
        return view('staff.list', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'description' => 'nullable',
            'position' => 'required',
            'department' => 'required',
            'status' => 'required',
        ]);
        if (Staff::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'This email is already taken.']);
        }

        // Create new Staff record
        Staff::create($request->all());

        return redirect()->back()->with('success', 'Staff created successfully');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.partial.staff_from', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'description' => 'nullable',
            'position' => 'required',
            'department' => 'required',
            'status' => 'required',
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff')->with('success', 'Staff updated successfully');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->back();
    }
}