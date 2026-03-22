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
}
