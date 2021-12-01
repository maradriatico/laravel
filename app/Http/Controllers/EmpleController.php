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

    public function store()
    {   $validados = $this->validar();

        DB::table('emple')->insert([
            'nombre' => $validados['nombre'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['depart_id'],
        ]);

        return redirect('/emple')
            ->with('success', 'Empleado insertado con éxito.');

    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
            'salario' => 'required|numeric:6,2',
            'depart_id' => 'required'
        ]);
        return $validados;

    }

}
