@extends('layouts.app')

@section('title', 'Candidatos')

@section('content')
    <form method="POST" action="{{route('candidatos.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="cedula">C&eacute;dula</label>
            <input id="cedula" name="cedula" type="text" class="@error('cedula') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="@error('nombre') is-invalid @enderror form-control" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
            <label for="telefono">Tel&eacute;fono</label>
            <input id="telefono" name="telefono" type="number" class="@error('telefono') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" name="departamento" class="@error('departamento') is-invalid @enderror custom-select">
                @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario al que aspira</label>
            <input id="salario" name="salario" type="number" class="@error('salario') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <label for="recomendado">Recomendado por</label>
            <input id="recomendado" name="recomendado" type="text" class="@error('recomendado') is-invalid @enderror form-control">
        </div>
        <div class="form-group">
            <h4>Capacitaciones</h4>
            @foreach ($capacitaciones as $capacitacion)
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input @error('capacitaciones') is-invalid @enderror"
                        type="checkbox"
                        id="capacitacion{{$capacitacion->id}}"
                        value="{{$capacitacion->id}}"
                        name="capacitaciones[]"
                    >
                    <label class="form-check-label" for="capacitacion{{$capacitacion->id}}">{{$capacitacion->descripcion}}</label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <h4>Competencias</h4>
            @foreach ($competencias as $competencia)
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input @error('competencias') is-invalid @enderror"
                        type="checkbox"
                        id="competencias{{$competencia->id}}"
                        value="{{$competencia->id}}"
                        name="competencias[]"
                    >
                    <label class="form-check-label" for="competencias{{$competencia->id}}">{{$competencia->descripcion}}</label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <h4>Idiomas</h4>
            @foreach ($idiomas as $idioma)
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input @error('idiomas') is-invalid @enderror"
                        type="checkbox"
                        id="idiomas{{$idioma->id}}"
                        value="{{$idioma->id}}"
                        name="idiomas[]"
                    >
                    <label class="form-check-label" for="idiomas{{$idioma->id}}">{{$idioma->nombre}}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" name="crear" class="btn btn-primary">Crear</button>
        <button type="submit" name="crear_y_experiencia" class="btn btn-secondary">Crear y agregar experiencia</button>
    </form>
@endsection
