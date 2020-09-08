@extends('layouts.app')

@section('title', 'Puestos')

@section('content')

    @can('admin-stuff')
    <div><a href="{{route('puestos.create')}}" class="btn btn-primary">Crear Puesto</a></div>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel de Riesgo</th>
                <th scope="col">Salario Minimo</th>
                <th scope="col">Salario Maximo</th>
                @can('admin-stuff')
                <th scope="col">Candidatos</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                @elsecan('candidate-stuff')
                <th scope="col"></th>
                @endcan
            </tr>
        </thead>
        <tbody>
        @foreach ($puestos as $puesto)
            <tr>
                <th scope="row">{{ $puesto->nombre }}</th>
                <th scope="row">{{ $puesto->nivel_riesgo }}</th>
                <th scope="row">{{ $puesto->salario_minimo }}</th>
                <th scope="row">{{ $puesto->salario_maximo }}</th>
                @can('admin-stuff')
                <td>{{ $puesto->candidatos->count() }}</td>
                <td>{{ $puesto->estado }}</td>
                <td><a href="{{route('puestos.show', $puesto)}}" class="btn btn-primary">Ver</a></td>
                <td><a href="{{route('puestos.edit', $puesto)}}" class="btn btn-secondary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('puestos.destroy', $puesto)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
                @elsecan('candidate-stuff')
                <td>
                    @if(in_array($puesto->id, $puestos_aplicados))
                    <a href="{{route('candidates.position.remove', ['id' => Auth::user()->candidato->id, 'puestoId' => $puesto->id])}}" class="btn btn-danger">
                        Remover
                    </a>
                    @else
                    <a href="{{route('candidates.position.apply', ['id' => Auth::user()->candidato->id, 'puestoId' => $puesto->id])}}" class="btn btn-primary">
                        Aplicar
                    </a>
                    @endif
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    @if (!isset($hide_links))
        {{ $puestos->links() }}
    @endif

@endsection
