@extends('layouts.app')

@section('title', 'Editar Capacitaciones')

@section('content')
    <form method="POST" action="{{route('capacitaciones.update', $capacitacion)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control" value="{{$capacitacion->descripcion}}">
        </div>
        <div class="form-group">
            <label for="nivel">Nivel</label>
            <select id="nivel" name="nivel" class="@error('nivel') is-invalid @enderror custom-select">
                @foreach ($niveles as $nivel)
                    <option value="{{$nivel->id}}" @if($capacitacion->nivel->id == $nivel->id) selected @endif>{{$nivel->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_desde">Fecha desde</label>
            <input id="fecha_desde" type="date" name="fecha_desde" class="@error('fecha_desde') is-invalid @enderror form-control" value="{{$capacitacion->fecha_desde}}">
        </div>
        <div class="form-group">
            <label for="fecha_hasta">Fecha hasta</label>
            <input id="fecha_hasta" type="date" name="fecha_hasta" class="@error('fecha_hasta') is-invalid @enderror form-control" value="{{$capacitacion->fecha_hasta}}">
        </div>
        <div class="form-group">
            <label for="institucion">Institucion</label>
            <input id="institucion" type="text" name="institucion" class="@error('institucion') is-invalid @enderror form-control" value="{{$capacitacion->institucion}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
