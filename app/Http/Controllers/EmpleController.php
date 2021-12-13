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
            'depart_id' => 'required|exists:depart,id'
        ]);

        return $validados;

    }

    public function edit($id)
    {
        $empleado = $this->findEmpleado($id);

        return view('emple.edit', [
            'empleado' => $empleado,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $this->findEmpleado($id);

        DB::table('emple')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['depart_id'],
        ]);

        return redirect('/emple')
            ->with('success', 'Empleado modificado con éxito.');
    }

    public function destroy($id)
    {
        $empleados = $this->findEmpleado($id);

        DB::delete('DELETE FROM emple WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    /* public function show($id)
    {
        $empleado = $this->findEmpleado($id);

        // if (empty($empleado)) {
        //     return redirect('/emple')
        //         ->with('error', 'El empleado no existe');
        // }

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    } */

    private function findEmpleado($id)
    {
        $empleados = DB::table('emple')
            ->where('id', $id)
            ->get();

        abort_if($empleados->isEmpty(), 404);

        return $empleados->first();
    }

}
