<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $user = User::with('department')->get();
        return view('department.index' , compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);

        Department::create([
            'name'  => $request->name,
        ]);

        return back();
    }

    public function show($department)
    {
        $department =  Department::findOrFail($department);

        return view('department.show', [
            'department' => $department
        ]);
    }

    public function edit($id)
    {
        $department = Department::find($id);

        return view('department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->name = $request->name;

        $department->save();

        return redirect()
            ->route('department.edit', $department)
            ->with('info', 'El usuario ha sido actualizado correctamente');
        ;

    }

    public function destroy(Department $department)
    {
        $department->delete();

        return back();
    }
}
