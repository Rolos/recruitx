@extends('layouts.app')

@section('title', 'Puestos')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$puesto->nombre}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$puesto->candidatos->count()}} Candidatos</h6>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><strong>Nivel de Riesgo:</strong> {{$puesto->nivel_riesgo}}</li>
                <li class="list-group-item"><strong>Salario M&iacute;nimo:</strong> {{$puesto->salario_minimo}}</li>
                <li class="list-group-item"><strong>Salario M&aacute;ximo:</strong> {{$puesto->salario_maximo}}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{$puesto->estado}}</li>
            </ul>
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
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($puesto->candidatos as $candidato)
            <tr>
                <th scope="row">{{ $candidato->cedula }}</th>
                <td>{{ $candidato->nombre }}</td>
                <td>{{ $candidato->telefono }}</td>
                <td>{{ $candidato->departamento->nombre }}</td>
                <td>{{ $candidato->salario_al_que_aspira }}</td>
                <td>{{ $candidato->recomendado_por }}</td>
                <td>
                    @if($candidato->es_empleado)
                        ✓
                    @else
                        <a href="{{route('empleados.create.candidate', ['candidatoId' => $candidato->id])}}" class="btn btn-primary">Contratar</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
