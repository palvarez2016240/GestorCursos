@extends('layouts.plantilla')

@section('title', 'Perfil de ' . $estudiante->nombres)

@section('content')

    <!-- Notificaciones -->
@if (session('alumnoCreado'))
    <div class="alert alert-success">
        <strong>{{session('alumnoCreado')}}</strong>
    </div>
@endif

@if (session('alumnoEditado'))
    <div class="alert alert-success">
        <strong>{{session('alumnoEditado')}}</strong>
    </div>
@endif


    <!-- Titulo -->
    <div class="container">
        <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <h1 style="text-align: center"> <strong>Perfil Estudiantil</strong></h1>
        </div>
        <div class="col">
        </div>
        </div>
    </div>

    <!--- Botones Regresar --->
    <div class="container">
            <div class="row">
              <div class="col">
                <a href="javascript:window.history.go(-1);" style="text-decoration: none">Regresar</a>
              </div>
              <div class="col">
              </div>
              <div class="col">
                </div>
              <div class="col">
              </div>
            </div>
    </div>

    <br>

    <!-- Datos del estudiante -->
    <div class="container">
        <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <img style="max-width: 120px" src="https://static.wixstatic.com/media/e75e21_defd59f127ac4f0cb3c1352b7afeccf6~mv2.png/v1/fill/w_320,h_320,al_c,q_85,usm_0.66_1.00_0.01/estudiante-icono.webp" class="card-img-top" alt="...">
            <br><br>
            <p style="font-size: large"> <strong>Nombre</strong> {{$estudiante->nombres}}</p>
          </div>
          <div class="col">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editarEstudiante">Editar</button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminarEstudiante">Eliminar</button>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

    <br><br>

    <!-- Cabecera notas -->
    <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
            <h2 style="text-align: center">Notas</h2>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

    <br>

    <!-- Notas -->
    <div class="container">
        <div class="row">
          <div class="col">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="text-align: center">Curso</th>
                    <th scope="col" style="text-align: center">Nota</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $n)
                  <tr>
                    <td style="text-align: center"> <a href="{{route('cursos.show', $n->course_id)}}">{{$n->course_id}}</a></td>
                    <td style="text-align: center">{{$n->nota}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

          </div>
        </div>
    </div>

    <!-- Modal editar estidiante -->
    <div class="modal fade" id="editarEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Estudiante</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">
                        {!! Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante], 'method' => 'put']) !!}

                            <div class="class-group">
                                {!! Form::label('nombres', 'Nombre del estudiante') !!}
                                {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nuevo nombre']) !!}

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
                                        {!! Form::submit('Editar estudiante', ['class' => 'btn btn-outline-success']) !!}
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
    <div class="modal fade" id="eliminarEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('estudiantes.destroy', $estudiante)}}" method="POST">
                    @csrf
                    @method('delete')

                    <label style="text-align: center" class="form-label">Estas seguro de eliminar al estudiante <strong>{{$estudiante->nombres}}</strong>, se eliminara todo lo relacionado con el estudiante</label>

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
