<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
    public function index()
    {
        $departs = DB::select('select * from depart');
        return view('depart.index', [
            'departamentos' => $departs,
        ]);
    }

    public function create(){

        return view('depart.create');
    }

    public function store()
    {
        return view('depart.store');
    }
}
