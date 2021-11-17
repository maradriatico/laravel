<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        $emple = DB::select('select * from emple');
        return view('emple.index', [
            'empleados' => $emple,
        ]);
    }

    public function create(){
        return 'Que pasa?';
    }

    public function store()
    {
        // ahahi
    }
}
