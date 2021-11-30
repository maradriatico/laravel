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

        $empleado = (object) [
            'nombre' => null,
            'fecha_alt' => null,
            'salario' => null,
            'depart_id' => null,
        ];

        return view('emple.create', [
            'empleado' => $empleado,
        ]);
    }


}
