@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')

<!-- Notificaciones -->
@if (session('cursoEliminado'))
    <div class="alert alert-success">
        <strong>{{session('cursoEliminado')}}</strong>
    </div>
@endif

@if (session('actividadEliminada'))
    <div class="alert alert-success">
        <strong>{{session('actividadEliminada')}}</strong>
    </div>
@endif


<!-- Titulo -->
<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <h1 style="text-align: center"> <strong>Cursos</strong></h1>
      </div>
      <div class="col">
      </div>
    </div>
</div>

<!-- Botones del curso -->
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
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#agregarCurso">Agregar un curso</button>
      </div>
    </div>
</div>

    <br> <br> <br>

<!-- Cursos -->
<div class="container">
        <div class="row">
            @foreach ($cursos as $curso)
          <div class="col">

            <div class="card" style="width: 18rem;">
                <img style="text-align: center" src="https://www.julianmarquina.es/wp-content/uploads/Leer-libros-durante-el-confinamiento-aporto-a-las-personas-lectoras.jpg" style="max-width: 100px" class="card-img-top" alt="...">
                <div class="card-body">
                  <p style="text-align: center" class="card-text" ><a style="font-size: x-large" href="{{route('cursos.show', $curso)}}">{{$curso->nombre}}</a></p>
                </div>
              </div>

          </div>
          @endforeach
        </div>
</div>

<!-- Modal agregar curso -->
<div class="modal fade" id="agregarCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="card">
                <div class="card-body">
                    {!! Form::open(['routes' => 'cursos.store']) !!}

                        <div class="class-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del curso']) !!}

                            @error('nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <br> <br>

                            {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del curso']) !!}

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
                                    {!! Form::submit('Crear el curso', ['class' => 'btn btn-outline-success']) !!}
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
@endsection

