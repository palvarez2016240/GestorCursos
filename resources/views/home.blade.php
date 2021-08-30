@extends('layouts.plantilla')

@section('title', 'Gestor de Cursos')

@section('content')

<br>

<div class="container">

    <!-- Encabezado -->
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <h1 style="text-align: center">Bienvenido Gestor de Cursos</h1>
      </div>
      <div class="col">
      </div>
    </div>

  <br> <br>

  <div class="row">
      <div class="col">
      </div>

      <!-- Cursos -->
    <div class="col">

        <div class="card" style="width: 18rem;">
            <img src="https://previews.123rf.com/images/dejanj01/dejanj011508/dejanj01150800031/44249050-colecci%C3%B3n-de-iconos-que-presentan-diferentes-materias-escolares-ciencia-arte-historia-geograf%C3%ADa-qu%C3%ADm.jpg" style="max-width: 225px" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text" style="text-align: center"> <a href="{{route('cursos.index')}}" style="font-size: x-large">Ver cursos</a></p>
            </div>
        </div>

    </div>

    <!-- Alumnos -->
    <div class="col">

        <div class="card" style="width: 18rem;">
            <img src="https://st2.depositphotos.com/3662505/6878/i/600/depositphotos_68789187-stock-photo-students.jpg" class="card-img-top" alt="..." style="min-width: 275px">
            <div class="card-body">
              <p class="card-text" style="text-align: center"> <a href="{{route('estudiantes.index')}}" style="font-size: x-large">Ver estudiantes</a></p>
            </div>
        </div>

    </div>

    <div class="col">
    </div>
  </div>
</div>
</div>
@endsection
