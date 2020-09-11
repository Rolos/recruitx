@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')

    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Capacitaciones</h2>
        </div>
        <div class="col-2 text-right">
            <a href="{{route('capacitaciones.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Nivel</th>
                <th scope="col">Fecha desde</th>
                <th scope="col">Fecha hasta</th>
                <th scope="col">Institucion</th>
                <th scope="col" class="w-50px"></th>
                <th scope="col" class="w-50px"></th>
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
                    <td class="px-0"><a href="{{route('capacitaciones.edit', $capacitacion)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td class="px-0">
                        <form method="POST" action="{{route('capacitaciones.destroy', $capacitacion)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $capacitaciones->links() }}
    </div>

@endsection
