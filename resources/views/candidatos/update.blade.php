@extends('layouts.app')

@section('title', 'Editar Candidatos')

@section('content')
    <form method="POST" action="{{route('candidatos.update', $candidato)}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="cedula">C&eacute;dula</label>
            <input id="cedula" name="cedula" type="text" class="@error('cedula') is-invalid @enderror form-control" value="{{$candidato->cedula}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="@error('nombre') is-invalid @enderror form-control" value="{{$candidato->nombre}}">
        </div>
        <div class="form-group">
            <label for="puesto">Puesto al que aspira</label>
            <select id="puesto" name="puesto" class="@error('puesto') is-invalid @enderror custom-select">
                @foreach ($puestos as $puesto)
                    <option value="{{$puesto->id}}" @if($puesto->id == $candidato->puestoAlQueAspira->id) selected @endif>{{$puesto->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <select id="departamento" name="departamento" class="@error('departamento') is-invalid @enderror custom-select">
                @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @if($departamento->id == $candidato->departamento->id) selected @endif>{{$departamento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="salario">Salario al que aspira</label>
            <input id="salario" name="salario" type="number" class="@error('salario') is-invalid @enderror form-control" value="{{$candidato->salario_al_que_aspira}}">
        </div>
        <div class="form-group">
            <label for="recomendado">Recomendado por</label>
            <input id="recomendado" name="recomendado" type="text" class="@error('recomendado') is-invalid @enderror form-control"  value="{{$candidato->recomendado_por}}">
        </div>
        <div class="form-group">
            <label for="capacitaciones">Capacitaciones</label>
            <select id="capacitaciones" class="@error('capacitaciones') is-invalid @enderror custom-select" multiple name="capacitaciones[]">
                @foreach ($capacitaciones as $capacitacion)
                    <option value="{{$capacitacion->id}}" @if(in_array($capacitacion->id, $candidato_capacitaciones)) selected @endif>{{$capacitacion->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="competencias">Competencias</label>
            <select id="competencias" name="competencias[]" class="@error('competencias') is-invalid @enderror custom-select" multiple>
                @foreach ($competencias as $competencia)
                    <option value="{{$competencia->id}}" @if(in_array($competencia->id, $candidato_competencias)) selected @endif>{{$competencia->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idiomas">Idiomas</label>
            <select id="idiomas" name="idiomas[]" class="@error('idiomas') is-invalid @enderror custom-select" multiple>
                @foreach ($idiomas as $idioma)
                    <option value="{{$idioma->id}}" @if(in_array($idioma->id, $candidato_idiomas)) selected @endif>{{$idioma->nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
