<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentcontroller extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')
        ->select('id', 'name')
        ->get();
        return view('master.department', ['departments' => $departments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        DB::table('departments')->insert([
            'name' => $request->name
        ]);

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        DB::table('departments')->where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('departments')->where('id', $id)->delete();

        return redirect()->route('department.index')
            ->with('success', 'Department deleted successfully.');
    }
}
