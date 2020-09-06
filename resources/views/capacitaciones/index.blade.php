@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')
    <div><a href="{{route('capacitaciones.create')}}" class="btn btn-primary">Crear Capacitaciones</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Nivel</th>
                <th scope="col">Fecha desde</th>
                <th scope="col">Fecha hasta</th>
                <th scope="col">Institucion</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($capacitaciones as $capacitacion)
            <tr>
                <th scope="row">{{ $capacitacion->descripcion }}</th>
                <td>{{ $capacitacion->nivel->nombre }}</td>
                <td>{{ $capacitacion->fecha_desde }}</td>
                <td>{{ $capacitacion->fecha_hasta }}</td>
                <td>{{ $capacitacion->institucion }}</td>
                <td><a href="{{route('capacitaciones.edit', $capacitacion)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('capacitaciones.destroy', $capacitacion)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $capacitaciones->links() }}
@endsection
