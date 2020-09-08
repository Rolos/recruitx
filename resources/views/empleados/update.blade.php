@extends('layouts.app')

@section('title', 'Editar Empleados')

@section('content')
    <form method="POST" action="{{route('empleados.update', $empleado)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="cedula">C&eacute;dula</label>
            <input id="cedula" name="cedula" type="text" class="@error('cedula') is-invalid @enderror form-control" value="{{$empleado->cedula}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="@error('nombre') is-invalid @enderror form-control" value="{{$empleado->nombre}}">
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de ingreso</label>
            <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="@error('fecha_ingreso') is-invalid @enderror form-control" value="{{$empleado->fecha_ingreso}}">
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" name="departamento" class="@error('departamento') is-invalid @enderror custom-select">
                @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @if($departamento->id == $empleado->departamento->id) selected @endif>{{$departamento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <select id="puesto" name="puesto" class="@error('puesto') is-invalid @enderror custom-select">
                @foreach ($puestos as $puesto)
                    <option value="{{$puesto->id}}" @if($puesto->id == $empleado->puesto->id) selected @endif>{{$puesto->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario Mensual</label>
            <input id="salario" name="salario" type="number" class="@error('salario') is-invalid @enderror form-control" value="{{$empleado->salario_mensual}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" class="@error('estado') is-invalid @enderror custom-select">
                <option value="inactivo" @if($empleado->estado == 'inactivo') selected @endif>inactivo</option>
                <option value="activo" @if($empleado->estado == 'activo') selected @endif>activo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
