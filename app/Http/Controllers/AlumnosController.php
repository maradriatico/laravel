<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumn = DB::select('select * from alumnos ');
        return view('alumnos.index', [
            'alumnos' => $alumn,
        ]);

    }

    public function create()
    {
        $alumno = (object) [
            'nombre' => null,
        ];

        return view('alumnos.create', [
            'alumno' => $alumno,
        ]);
    }

    public function store()
    {
        $validados = $this->validar();

        DB::table('alumnos')->insert([
            'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno insertado con éxito.');
    }

    public function edit($id)
    {
        $alumno = $this->findAlumno($id);

        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $this->findAlumno($id);

        DB::table('alumnos')
            ->where('id', $id)
            ->update([
            'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno modificado con éxito.');
    }

    public function destroy($id)
    {
        $alumno = $this->findAlumno($id);

        DB::delete('DELETE FROM alumnos WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Alumno borrado correctamente');
    }

    public function findAlumno($id)
    {
        $alumnos = DB::table('alumnos')
            ->where('id', $id)
            ->get();

        abort_if($alumnos->isEmpty(), 404);

        return $alumnos->first();
    }

    public function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
        ]);

        return $validados;
    }


    public function actividad($id)
    {
        $nota = DB::table('notas')
            ->leftJoin('ccee AS c', 'ccee_id', '=', 'c.id')
            ->where('alumno_id', $id)
            ->get();

        $alumno = DB::table('alumnos')
            ->where('id', $id)
            ->get();

        return view('alumnos.actividad', [
            'notas' => $nota,
            'alumno' => $alumno->first()
        ]);
    }

    public function final()
    {
        $alumn = DB::select('select nombre, avg(nota)::decimal(4,2) as media
                             from alumnos a left join notas n
                                on a.id = alumno_id group by a.id');


        return view('alumnos.final', [
            'alumnos' => $alumn,
        ]);

    }

}
