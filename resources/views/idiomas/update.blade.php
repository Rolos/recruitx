@extends('layouts.app')

@section('title', 'Editar Idioma')

@section('content')
    <form method="POST" action="{{route('idiomas.update', $idioma)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control" value="{{$idioma->nombre}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                <option value="inactivo" @if($idioma->estado == 'inactivo') selected @endif>inactivo</option>
                <option value="activo" @if($idioma->estado == 'activo') selected @endif>activo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
