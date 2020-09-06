@extends('layouts.app')

@section('title', 'Crear Niveles de Capacitacion')

@section('content')
    <form method="POST" action="{{route('cniveles.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
