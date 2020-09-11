@extends('layouts.app')

@section('title', 'Actualizar Idioma')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Actualizar Idioma</h2>
        </div>
    </div>

    <form method="POST" action="{{route('idiomas.update', $idioma)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control" value="{{$idioma->nombre}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                        <option value="inactivo" @if($idioma->estado == 'inactivo') selected @endif>inactivo</option>
                        <option value="activo" @if($idioma->estado == 'activo') selected @endif>activo</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    </form>
@endsection
