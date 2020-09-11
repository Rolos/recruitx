@extends('layouts.app')

@section('title', 'Actualizar Competencia')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Actualizar Competencia</h2>
        </div>
    </div>

    <form method="POST" action="{{route('competencias.update', $competencia)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control" value="{{$competencia->descripcion}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                        <option value="inactivo" @if($competencia->estado == 'inactivo') selected @endif>inactivo</option>
                        <option value="activo" @if($competencia->estado == 'activo') selected @endif>activo</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    </form>
@endsection
