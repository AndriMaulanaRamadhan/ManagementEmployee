<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employess = DB::table('employess')
            ->join('departments', 'employess.departmentid', '=', 'departments.id')
            ->join('positions', 'employess.positionid', '=', 'positions.id')
            ->select(
                'employess.*',
                'departments.name as department_name',
                'positions.name as position_name'
            )
            ->get();

        return view('master.employee', compact('employess'));
    }
}