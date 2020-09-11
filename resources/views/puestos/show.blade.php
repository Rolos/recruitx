@extends('layouts.app')

@section('title', 'Puestos')

@section('content')

    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>
                {{$puesto->nombre}}
                <small class="text-muted">{{$puesto->candidatos->count()}} Candidatos</small>
            </h2>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Caracteristicas</h5>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><strong>Nivel de Riesgo:</strong> {{$puesto->nivel_riesgo}}</li>
                        <li class="list-group-item"><strong>Salario M&iacute;nimo:</strong> {{$puesto->salario_minimo}}</li>
                        <li class="list-group-item"><strong>Salario M&aacute;ximo:</strong> {{$puesto->salario_maximo}}</li>
                        <li class="list-group-item"><strong>Estado:</strong> {{$puesto->estado}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4 class="mb-4">Candidatos</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Salario al que aspira</th>
                    <th scope="col">Recomendado por</th>
                    <th scope="col" class="w-50px"></th>
                    <th scope="col" class="w-50px"></th>
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
                        <td class="px-0">
                            <a href="{{route('candidatos.show', $candidato)}}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="px-0 text-center">
                            @if($candidato->es_empleado)
                                <span class="hired" title="Contratado">
                                    <i class="fas fa-check"></i>
                                </span>
                            @elseif ($puesto->estado == 'activo')
                                <a href="{{route('empleados.create.candidate', ['candidatoId' => $candidato->id, 'puestoId' => $puesto->id])}}" class="btn btn-danger" title="Contratar">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
