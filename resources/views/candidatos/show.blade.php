@extends('layouts.app')

@section('title', 'Perfil de Candidato')

@section('content')

    <h2>
        {{$candidato->nombre}}
        @can ('same-candidate', $candidato->id)
            <small class="text-muted"><a href="{{route('candidatos.edit', $candidato)}}"><i class="fas fa-edit"></i></a></small>
        @endcan
    </h2>
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title">Datos B&aacute;sicos</h5>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><strong>Cedula:</strong> {{$candidato->cedula}}</li>
                <li class="list-group-item"><strong>Telefono:</strong> {{$candidato->telefono}}</li>
                <li class="list-group-item"><strong>Departamento:</strong> {{$candidato->departamento->nombre}}</li>
                <li class="list-group-item"><strong>Salario al que aspira:</strong> {{$candidato->salario_al_que_aspira}}</li>
                <li class="list-group-item"><strong>Recomendado por:</strong> {{$candidato->recomendado_por}}</li>
            </ul>
        </div>
    </div>

    @if($candidato->has('capacitaciones'))
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Capacitaciones</h5>
                <ul class="list-group">
                    @foreach($candidato->capacitaciones as $capacitacion)
                        <li class="list-group-item">{{$capacitacion->descripcion}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if($candidato->has('competencias'))
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Competencias</h5>
                <ul class="list-group">
                    @foreach($candidato->competencias as $competencia)
                        <li class="list-group-item">{{$competencia->descripcion}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if($candidato->has('idiomas'))
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Idiomas</h5>
                <ul class="list-group">
                    @foreach($candidato->idiomas as $idioma)
                        <li class="list-group-item">{{$idioma->nombre}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @include('includes.experiencias')
@endsection
