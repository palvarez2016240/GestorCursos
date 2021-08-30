@extends('layouts.plantilla')

@section('title', 'Estudiantes')

@section('content')

    <!-- Notificaciones -->
@if (session('alumnoEliminado'))
    <div class="alert alert-success">
        <strong>{{session('alumnoEliminado')}}</strong>
    </div>
@endif


    <!--- Titulo Estudiantes --->
<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <h1 style="text-align: center"> <strong>Estudiantes ingresados</strong></h1>
      </div>
      <div class="col">
      </div>
    </div>
</div>

    <br>

    <!--- Botones Estudiantes --->
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
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#agregarAlumno">Agregar estudiante</button>
          </div>
        </div>
    </div>

    <br><br>

    <!-- Lista de alumnos -->
    <div class="container">
        <div class="row">

            @foreach ($alumnos as $alumno)
          <div class="col">
            <div class="card" style="width: 18rem;">
                <img style="max-width: 120px" src="https://static.wixstatic.com/media/e75e21_defd59f127ac4f0cb3c1352b7afeccf6~mv2.png/v1/fill/w_320,h_320,al_c,q_85,usm_0.66_1.00_0.01/estudiante-icono.webp" class="card-img-top" alt="...">
                <div class="card-body">
                  <p style="text-align: center" class="card-text" ><strong style="font-size: large">Nombre</strong> <a style="font-size: x-large"href="{{route('estudiantes.show', $alumno)}}">{{$alumno->nombres}}</a></p>
                </div>
              </div>
              <br>
          </div>
          @endforeach
        </div>
    </div>

    <!-- Modal agregar alumno -->
    <div class="modal fade" id="agregarAlumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Alumno</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['routes' => 'estudiantes.store']) !!}

                            <div class="class-group">
                                {!! Form::label('nombres', 'Nombre del estudiante') !!}
                                {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo']) !!}

                                @error('nombres')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

                            <br>

                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                  </div>
                                  <div class="col">
                                        {!! Form::submit('Crear el alumno', ['class' => 'btn btn-outline-success']) !!}
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
    </div

@endsection
