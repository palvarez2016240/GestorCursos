@extends('layouts.plantilla')

@section('title', 'Actividad '. $actividad->nombre)

@section('content')

    <!-- Notificaciones -->
@if (session('actividadCreada'))
    <div class="alert alert-success">
        <strong>{{session('actividadCreada')}}</strong>
    </div>
@endif

@if (session('actividadEditada'))
    <div class="alert alert-success">
        <strong>{{session('actividadEditada')}}</strong>
    </div>
@endif


<!--- Titulo Actividad --->
<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <h1 style="text-align: center"> <strong>{{$actividad->nombre}}</strong></h1>
      </div>
      <div class="col">
      </div>
    </div>
</div>

    <br>

    <!--- Botones Actividad --->
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
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editarActividad">Editar</button>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminarActividad">Eliminar</button>
      </div>
    </div>
</div>

    <br>

 <!--- Descripcion del actividad --->
 <div class="container">
    <div class="row">
      <div class="col">
        <strong>Descripcion de la actvidad:</strong>
        <p>{{$actividad->descripcion}}</p>
      </div>
    </div>
</div>

    <br> <br>

    <!--- Titulo de los alumnos --->
    <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col">
            <h2>Calificar estudiantes</h2>
          </div>
          <div class="col">
          </div>
        </div>
    </div>

    <br>

    <!--- Poner notas de los salumnos --->
    <div class="container">
        <div class="row">
          <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="text-align: center">Estudiante</th>
                    <th scope="col" style="text-align: center">Nota</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center">a</td>
                    <td style="text-align: center">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Agregar Nota</option>
                        <option value="0">0</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="10">100</option>
                      </select>
                    </td>
                    <td><button  type="button" class="btn btn-outline-success">Guardar</button></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>

    <!-- Modal editar actividad -->
    <div class="modal fade" id="editarActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Actividad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">

                        {!! Form::model($actividad, ['route' => ['actividad.update', $actividad], 'method' => 'put']) !!}

                            <div class="class-group">
                                {!! Form::label('nombre', 'Nombre') !!}
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nuevo nombre de la actividad']) !!}

                                @error('nombre')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                                <br> <br>

                                {!! Form::label('descripcion', 'Descripcion') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Cambiar descripcion de la actividad']) !!}

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
                                        {!! Form::submit('Editar la actividad', ['class' => 'btn btn-outline-success']) !!}
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
    <div class="modal fade" id="eliminarActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('actividad.destroy', $actividad)}}" method="POST">
                    @csrf
                    @method('delete')

                    <label style="text-align: center" class="form-label">Estas seguro de eliminar la actvidad <strong> {{$actividad->nombre}}</strong>, se eliminara todo lo relacionado con la actvidad</label>

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
