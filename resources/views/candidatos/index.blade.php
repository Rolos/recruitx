@extends('layouts.app')

@section('title', 'Candidatos')

@section('content')

    <form id="candidatos_filter_form">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Puestos</h5>
                        @foreach ($puestos as $puesto)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="puesto{{$puesto->id}}" name="puestos[]" value="{{$puesto->id}}" @if(in_array($puesto->id, old('puestos', []))) checked @endif>
                                <label class="form-check-label" for="puesto{{$puesto->id}}">{{$puesto->nombre}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Capacitaciones</h5>
                        @foreach ($capacitaciones as $capacitacion)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="capacitacion{{$capacitacion->id}}" name="capacitaciones[]" value="{{$capacitacion->id}}" @if(in_array($capacitacion->id, old('capacitaciones', []))) checked @endif>
                                <label class="form-check-label" for="capacitacion{{$capacitacion->id}}">{{$capacitacion->descripcion}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Competencias</h5>
                        @foreach ($competencias as $competencia)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="competencia{{$competencia->id}}" name="competencias[]" value="{{$competencia->id}}" @if(in_array($competencia->id, old('competencias', []))) checked @endif>
                                <label class="form-check-label" for="competencia{{$competencia->id}}">{{$competencia->descripcion}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Idiomas</h5>
                        @foreach ($idiomas as $idioma)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="idioma{{$idioma->id}}" name="idiomas[]" value="{{$idioma->id}}" @if(in_array($idioma->id, old('idiomas', []))) checked @endif>
                                <label class="form-check-label" for="idioma{{$idioma->id}}">{{$idioma->nombre}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Departamentos</h5>
                        @foreach ($departamentos as $departamento)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="departamento{{$departamento->id}}" name="departamentos[]" value="{{$departamento->id}}" @if(in_array($departamento->id, old('departamentos', []))) checked @endif>
                                <label class="form-check-label" for="departamento{{$departamento->id}}">{{$departamento->nombre}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="form-row align-items-center">
                    <div class="col-3">
                        <input type="text" class="form-control mb-2" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control mb-2" placeholder="Cedula" name="cedula" value="{{ old('cedula') }}">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control mb-2" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Salario al que aspira</th>
                        <th scope="col">Recomendado por</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($candidatos as $candidato)
                        <tr>
                            <th scope="row">{{ $candidato->cedula }}</th>
                            <td>{{ $candidato->nombre }}</td>
                            <td>{{ $candidato->telefono }}</td>
                            <td>{{ $candidato->departamento->nombre }}</td>
                            <td>{{ $candidato->salario_al_que_aspira }}</td>
                            <td>{{ $candidato->recomendado_por }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $candidatos->links() }}
            </div>
        </div>
    </form>
@endsection
