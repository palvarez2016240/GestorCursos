<?php

namespace App\Http\Controllers;

use App\Models\assignament;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\exercise;
use App\Models\User;

class CursoController extends Controller
{
    public function index(){
        $cursos = Course::orderBy('id', 'desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function show(Course $curso){
        $alumnos = assignament::where('course_id', $curso->id)->get();

          $noAsignados = User::join('assignaments','Users.id','=','assignaments.user_id')->join('courses','courses.id','!=','assignaments.course_id')
           ->select(['Users.id','Users.nombres'])->where('courses.id','!=',$curso->id)->get();

        $actividades = exercise::where('course_id',$curso->id)->get();

      return view('cursos.show', compact('curso', 'alumnos', 'actividades', 'noAsignados'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|unique:Courses',
            'descripcion' => 'required'
        ]);

        $cursos = Course::create($request->all());

        return redirect()->route('cursos.show', $cursos)->with('cursoCreado', 'Curso creado satisfactoriamente');
    }

    public function update(Request $request, Course $curso){

        $request->validate([
            'nombre' => "required|unique:Courses,nombre,$curso->id",
            'descripcion' => 'required'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.show', $curso)->with('cursoEditado', 'Curso edtitado satisfactoriamente');
    }

    public function destroy(Course $curso){

        $curso->delete();

        return redirect()->route('cursos.index')->with('cursoEliminado', 'Curso eliminado satisfactoriamente');
    }
}
