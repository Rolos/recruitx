@extends('layouts.app')

@section('title', 'Candidatos')

@section('content')
    <div><a href="{{route('candidatos.create')}}" class="btn btn-primary">Crear Candidato</a></div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Departamento</th>
            <th scope="col">Salario al que aspira</th>
            <th scope="col">Recomendado por</th>
            <th scope="col">Empleado</th>
            <th scope="col"></th>
            <th scope="col"></th>
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
                <td>
                    @if($candidato->es_empleado)
                        ✓
                    @else
                        <a href="{{route('empleados.create.candidate', ['candidatoId' => $candidato->id])}}" class="btn btn-primary">Convertir en Empleado</a>
                    @endif
                </td>
                <td><a href="{{route('candidatos.edit', $candidato)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('candidatos.destroy', $candidato)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $candidatos->links() }}
@endsection
