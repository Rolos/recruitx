@extends('layouts.app')

@section('title', 'Crear Departamentos')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Crear Departamento</h2>
        </div>
    </div>

    <form method="POST" action="{{route('departamentos.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </form>
@endsection
