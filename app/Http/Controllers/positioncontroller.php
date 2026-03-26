<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class positioncontroller extends Controller
{
    public function index()
    {
        $positions = DB::table('positions')
        ->select('id', 'name', 'salary')
        ->get();
        return view('master.position', ['positions' => $positions]);
    }

    public function store(Request $request)
    {
        DB::table('positions')->insert([
            'name' => $request->name,
            'salary' => $request->salary
        ]);
        return redirect()->route('position.index')->with('success', 'Position created successfully.');
    }

    public function update(Request $request, $id)
    {
        DB::table('positions')->where('id', $id)->update([
            'name' => $request->name,
            'salary' => $request->salary
        ]);
        return redirect()->route('position.index')->with('success', 'Position updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('positions')->where('id', $id)->delete();
        return redirect()->route('position.index')
            ->with('success', 'Position deleted successfully.');
    }
}
