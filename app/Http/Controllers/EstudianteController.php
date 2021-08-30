<?php

namespace App\Http\Controllers;

use App\Models\assignament;
use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(){
        $alumnos = User::orderBy('id', 'desc')->paginate();
        return view('estudiantes.index', compact('alumnos'));
    }

    public function show(User $estudiante){
        $notas = assignament::where('user_id', $estudiante->id)->get();

        return view('estudiantes.show', compact('estudiante', 'notas'));
    }

    public function store(Request $request){

        $request->validate([
            'nombres' => 'required|unique:users'
        ]);

        $alumno = User::create($request->all());

        return redirect()->route('estudiantes.show', $alumno)->with('alumnoCreado', 'Alumno creado satisfactoriamente');
    }

    public function update(Request $request, User $estudiante){

        $request->validate([
            'nombres' => "required|unique:users,nombres,$estudiante->id"
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.show', $estudiante)->with('alumnoEditado', 'Alumno editado satisfactoriamente');
    }

    public function destroy(User $estudiante){
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('alumnoEliminado', 'Alumno eliminado satisfactoriamente');
    }
}
