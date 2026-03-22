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
}
