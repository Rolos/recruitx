@extends('layouts.app')

@section('title', 'Editar Competencias')

@section('content')
    <form method="POST" action="{{route('competencias.update', $competencia)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control" value="{{$competencia->descripcion}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                <option value="inactivo" @if($competencia->estado == 'inactivo') selected @endif>inactivo</option>
                <option value="activo" @if($competencia->estado == 'activo') selected @endif>activo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
