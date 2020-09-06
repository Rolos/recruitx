@extends('layouts.app')

@section('title', 'Editar Puesto')

@section('content')
    <form method="POST" action="{{route('puestos.update', $puesto)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control"  value="{{$puesto->nombre}}">
        </div>
        <div class="form-group">
            <label for="nivel_riesgo">Nivel de Riesgo</label>
            <select id="nivel_riesgo" name="nivel_riesgo" class="@error('nivel_riesgo') is-invalid @enderror custom-select">
                <option value="alto" @if($puesto->estado == 'alto') selected @endif>alto</option>
                <option value="medio" @if($puesto->estado == 'medio') selected @endif>medio</option>
                <option value="bajo" @if($puesto->estado == 'bajo') selected @endif>bajo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_salary">Salario Minimo</label>
            <input id="min_salary" type="number" name="min_salary" class="@error('min_salary') is-invalid @enderror form-control" value="{{$puesto->salario_minimo}}">
        </div>
        <div class="form-group">
            <label for="max_salary">Salario Maximo</label>
            <input id="max_salary" type="number" name="max_salary" class="@error('max_salary') is-invalid @enderror form-control" value="{{$puesto->salario_maximo}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                <option value="inactivo" @if($puesto->estado == 'inactivo') selected @endif>inactivo</option>
                <option value="activo" @if($puesto->estado == 'activo') selected @endif>activo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
