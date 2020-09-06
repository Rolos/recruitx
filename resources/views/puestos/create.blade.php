@extends('layouts.app')

@section('title', 'Crear Puesto')

@section('content')
    <form method="POST" action="{{route('puestos.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="nivel_riesgo">Nivel de Riesgo</label>
            <select id="nivel_riesgo" name="nivel_riesgo" class="@error('nivel_riesgo') is-invalid @enderror custom-select">
                <option value="alto">alto</option>
                <option value="medio">medio</option>
                <option value="bajo">bajo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="min_salary">Salario Minimo</label>
            <input id="min_salary" type="number" name="min_salary" class="@error('min_salary') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="max_salary">Salario Maximo</label>
            <input id="max_salary" type="number" name="max_salary" class="@error('max_salary') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
