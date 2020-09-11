@extends('layouts.app')

@section('title', 'Actualizar Candidatos')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Actualizar Candidato</h2>
        </div>
    </div>

    <div class="position-relative">
        <form method="POST" action="{{route('candidatos.update', $candidato)}}">
            @method('PUT')
            @csrf
            @include('includes.errors')
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="cedula">C&eacute;dula</label>
                        <input id="cedula" name="cedula" type="text" class="@error('cedula') is-invalid @enderror form-control" value="{{$candidato->cedula}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="@error('nombre') is-invalid @enderror form-control" value="{{$candidato->nombre}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="telefono">Tel&eacute;fono</label>
                        <input id="telefono" name="telefono" type="number" class="@error('telefono') is-invalid @enderror form-control" value="{{$candidato->telefono}}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <select id="departamento" name="departamento" class="@error('departamento') is-invalid @enderror custom-select">
                            @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->id}}" @if($departamento->id == $candidato->departamento->id) selected @endif>{{$departamento->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="salario">Salario al que aspira</label>
                        <input id="salario" name="salario" type="number" class="@error('salario') is-invalid @enderror form-control" value="{{$candidato->salario_al_que_aspira}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="recomendado">Recomendado por</label>
                        <input id="recomendado" name="recomendado" type="text" class="@error('recomendado') is-invalid @enderror form-control"  value="{{$candidato->recomendado_por}}">
                    </div>
                </div>
            </div>

            <div class="form-group my-4">
                <h4>Capacitaciones</h4>
                @foreach ($capacitaciones as $capacitacion)
                    <div class="form-check form-check-inline">
                        <input
                                class="form-check-input @error('capacitaciones') is-invalid @enderror"
                                type="checkbox"
                                id="capacitacion{{$capacitacion->id}}"
                                value="{{$capacitacion->id}}"
                                name="capacitaciones[]"
                                @if(in_array($capacitacion->id, $candidato_capacitaciones)) checked @endif
                        >
                        <label class="form-check-label" for="capacitacion{{$capacitacion->id}}">{{$capacitacion->descripcion}}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group my-4">
                <h4>Competencias</h4>
                @foreach ($competencias as $competencia)
                    <div class="form-check form-check-inline">
                        <input
                                class="form-check-input @error('competencias') is-invalid @enderror"
                                type="checkbox"
                                id="competencias{{$competencia->id}}"
                                value="{{$competencia->id}}"
                                name="competencias[]"
                                @if(in_array($competencia->id, $candidato_competencias)) checked @endif
                        >
                        <label class="form-check-label" for="competencias{{$competencia->id}}">{{$competencia->descripcion}}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group my-4">
                <h4>Idiomas</h4>
                @foreach ($idiomas as $idioma)
                    <div class="form-check form-check-inline">
                        <input
                                class="form-check-input @error('idiomas') is-invalid @enderror"
                                type="checkbox"
                                id="idiomas{{$idioma->id}}"
                                value="{{$idioma->id}}"
                                name="idiomas[]"
                                @if(in_array($idioma->id, $candidato_idiomas)) checked @endif
                        >
                        <label class="form-check-label" for="idiomas{{$idioma->id}}">{{$idioma->nombre}}</label>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-primary btn-lg">Actualizar</button>
        </form>
        <form method="POST" action="{{route('candidatos.destroy', $candidato)}}" class="position-absolute delete-button-trick">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-lg">Borrar</button>
        </form>
    </div>
    @include('includes.experiencias')
@endsection
