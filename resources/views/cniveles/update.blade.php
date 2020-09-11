@extends('layouts.app')

@section('title', 'Actualizar Niveles de Capacitacion')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Actualizar Nivel de Capacitacion</h2>
        </div>
    </div>

    <form method="POST" action="{{route('cniveles.update', $nivel)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control" value="{{$nivel->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control">{{$nivel->descripcion}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
