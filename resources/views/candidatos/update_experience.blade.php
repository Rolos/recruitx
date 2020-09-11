@extends('layouts.app')

@section('title', 'Actualizar Experiencia Laboral')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Actualizar Experiencia Laboral</h2>
        </div>
    </div>

    <form method="POST" action="{{route('candidates.experience.update',  ['id' => $candidato->id, 'experienceId' => $experiencia->id])}}">
        @method('PUT')
        @csrf
        @include('includes.errors')
        <div class="border p-4 mb-2">
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input id="empresa" name="empresa" type="text" class="@error('empresa') is-invalid @enderror form-control" value="{{$experiencia->empresa}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="puesto_ocupado">Puesto ocupado</label>
                        <select id="puesto_ocupado" name="puesto_ocupado" class="@error('puesto_ocupado') is-invalid @enderror custom-select">
                            @foreach ($puestos as $puesto)
                                <option value="{{$puesto->id}}" @if($experiencia->puesto_ocupado_id == $puesto->id) selected @endif>{{$puesto->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="salario">Salario</label>
                        <input id="salario" name="salario" type="text" class="@error('salario') is-invalid @enderror form-control" value="{{$experiencia->salario}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="fecha_desde">Fecha desde</label>
                        <input id="fecha_desde" name="fecha_desde" type="date" class="@error('fecha_desde') is-invalid @enderror form-control" value="{{$experiencia->fecha_desde}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="fecha_hasta">Fecha hasta</label>
                        <input id="fecha_hasta" name="fecha_hasta" type="date" class="@error('fecha_hasta') is-invalid @enderror form-control" value="{{$experiencia->fecha_hasta}}">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-2">Actualizar</button>
    </form>
@endsection
