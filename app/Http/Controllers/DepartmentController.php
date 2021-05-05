<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:department-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        // echo "data";
        // exit;
        $departments = department::where('is_active', 0)->latest()->paginate(10);
        return view('departments.index', compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'department' => 'required',
        ]);

        department::create($request->all());

        return redirect()->route('departments.index')
            ->with('success', 'department created successfully.');
    }

    public function show(department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, department $department)
    {
        request()->validate([
            'department' => 'required',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')
            ->with('success', 'department updated successfully');
    }

    public function destroy(department $department)
    {
        $department->is_active = 1;
        $department->update();
        return redirect()->route('departments.index')
            ->with('success', 'department deleted successfully');
    }
}
