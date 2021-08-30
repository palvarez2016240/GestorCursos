@extends('layouts.plantilla')

@section('title', 'Curso de ' . $curso->nombre)

@section('content')

<!-- Notificaciones -->
@if (session('cursoCreado'))
    <div class="alert alert-success">
        <strong>{{session('cursoCreado')}}</strong>
    </div>
@endif

@if (session('cursoEditado'))
    <div class="alert alert-success">
        <strong>{{session('cursoEditado')}}</strong>
    </div>
@endif


<!--- Titulo Curso --->
<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <h1 style="text-align: center"> <strong>{{$curso->nombre}}</strong></h1>
      </div>
      <div class="col">
      </div>
    </div>
</div>

    <!--- Botones Curso --->
<div class="container">
    <div class="row">
      <div class="col">
        <a href="javascript:window.history.go(-1);">Regresar</a>
      </div>
      <div class="col">
      </div>
      <div class="col">
        </div>
      <div class="col">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editarCurso">Editar</button>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminarCurso">Eliminar</button>
      </div>
    </div>
</div>

    <br>

    <!--- Descripcion del curso --->
    <div class="container">
        <div class="row">
          <div class="col">
              <strong>Descripcion del curso:</strong>
            <p>{{$curso->descripcion}}</p>
          </div>
        </div>
    </div>

    <br> <br>

    <!--- Titulo Actividad --->
    <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
            <h2 style="text-align: center">Actividades de {{$curso->nombre}} </h2>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

      <!--- Botones actividad --->
      <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
          </div>
          <div class="col">
            </div>
          <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#agregarActividad">Agregar Actvidad</button>
          </div>
        </div>
      </div>

    <br><br>

      <!--- Muestra la actividad --->
    <div class="container">
        <div class="row">
            @foreach ($actividades as $actividad)
            <div class="col">

                <div class="card" style="width: 18rem;">
                    <img style="text-align: center" src="https://previews.123rf.com/images/yupiramos/yupiramos1609/yupiramos160919852/62888999-icono-del-l%C3%A1piz-libreta-de-dibujos-animados-ilustraci%C3%B3n-vectorial-aislado-gr%C3%A1fico-eps-10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p style="text-align: center" class="card-text" ><a style="font-size: large" href="{{route('actividad.show', $actividad)}}">{{$actividad->nombre}}</a></p>
                    </div>
                  </div>

            </div>
          @endforeach
        </div>
    </div>

    <br> <br>

    <!--- Titulo de los alumnos --->
    <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
            <h2 style="text-align: center">Alumnos de {{$curso->nombre}}</h2>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

    <br> <br>

    <!--- Alumnos --->
    <div class="container">
        <div class="row">
          <div class="col">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="text-align: center">Nombre del estudiante</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td style="text-align: center"><a href="{{route('estudiantes.show', $alumno->user_id)}}">{{$alumno->user_id}}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
          <div class="col">

            <form action="" method="POST">
                @csrf

                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option  selected>Elejir alumno a asignar</option>
                        @foreach ($noAsignados as $alumno)
                            <li>
                                <option value="{{$alumno->user_id}}">{{$alumno->user_id}}</option>
                            </li>
                        @endforeach
                </select>
                <button  type="button" class="btn btn-outline-success">Asignar</button>
            </form>

          </div>

        </div>
    </div>

    <!-- Modal agregar Actividad -->
    <div class="modal fade" id="agregarActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva Actividad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                <div class="card-body">

                    <form action="{{route('actividad.store')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre de la actividad">
                        </div>

                        @error('nombre')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <br> <br>

                        <div class="form-floating">
                            <label for="floatingTextarea">Descripcion</label>
                            <textarea class="form-control" placeholder="Descripcion de la actividad"
                            id="floatingTextarea" name="descripcion" rows="3"></textarea>
                        </div>

                        @error('descripcion')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <br> <br>

                        <div class="mb-3">
                            <label class="form-label">Curso</label>
                            <input class="form-control disabled" readonly  name="course_id" value="{{ $curso->id }}">
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-success btn-xs">Crear la actividad</button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Modal editar curso -->
    <div class="modal fade" id="editarCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">

                        {!! Form::model($curso, ['route' => ['cursos.update', $curso], 'method' => 'put']) !!}

                            <div class="class-group">
                                {!! Form::label('nombre', 'Nombre') !!}
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nuevo nombre del curso']) !!}

                                @error('nombre')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                                <br> <br>

                                {!! Form::label('descripcion', 'Descripcion') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Cambiar descripcion del curso']) !!}

                                @error('descripcion')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <br>

                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                  </div>
                                  <div class="col">
                                        {!! Form::submit('Editar el curso', ['class' => 'btn btn-outline-success']) !!}
                                  </div>
                                  <div class="col">
                                  </div>
                                </div>
                              </div>
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
          </div>
        </div>
    </div>

    <!--Modal eliminar estudiante -->
    <div class="modal fade" id="eliminarCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('cursos.destroy', $curso)}}" method="POST">
                    @csrf
                    @method('delete')

                    <label style="text-align: center" class="form-label">Estas seguro de eliminar el curso <strong>{{$curso->nombre}}</strong>, se eliminara todo relacionado con el curso</label>

                    <br>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-outline-danger btn-xs">Si, estoy seguro</button>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
          </div>
        </div>
    </div>

@endsection
