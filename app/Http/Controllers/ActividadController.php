<?php

namespace App\Http\Controllers;

use App\Models\exercise;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function show(exercise $actividad){
        //return $exercise->users;

      return view('actividad', compact('actividad'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $actividad = exercise::create($request->all());

        return redirect()->route('actividad.show', $actividad)->with('actividadCreada', 'Actividad creada satisfactoriamente');
    }

    public function update(Request $request, exercise $actividad){
        $request->validate([
            'nombre' => "required",
            'descripcion' => 'required'
        ]);

        $actividad->update($request->all());

        return redirect()->route('actividad.show', $actividad)->with('actividadEditada', 'Actividad editada satisfactoriamente');
    }

    public function destroy(exercise $actividad){

        $actividad->delete();

        return redirect()->route('cursos.index')->with('actividadEliminada', 'Actividad eliminada satisfactoriamente');
    }
}
