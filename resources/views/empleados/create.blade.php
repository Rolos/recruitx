@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <form method="POST" action="{{route('empleados.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="cedula">C&eacute;dula</label>
            <input id="cedula" name="cedula" type="text" class="@error('cedula') is-invalid @enderror form-control" @if(isset($candidato)) value="{{$candidato->cedula}}" @endif>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="@error('nombre') is-invalid @enderror form-control" @if(isset($candidato)) value="{{$candidato->nombre}}" @endif>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" name="departamento" class="@error('departamento') is-invalid @enderror custom-select">
                @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @if(isset($candidato) && $candidato->departamento->id == $departamento->id) selected @endif>
                        {{$departamento->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <select id="puesto" name="puesto" class="@error('puesto') is-invalid @enderror custom-select">
                @foreach ($puestos as $puesto)
                    <option value="{{$puesto->id}}" @if(isset($puestoId) && $puestoId == $puesto->id) selected @endif>
                        {{$puesto->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario mensual</label>
            <input id="salario" name="salario" type="number" class="@error('salario') is-invalid @enderror form-control" @if(isset($candidato)) value="{{$candidato->salario_al_que_aspira}}" @endif>
        </div>
        @if (isset($candidato))
            <input type="hidden" name="candidato_id" value="{{$candidato->id}}"/>
        @endif
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
