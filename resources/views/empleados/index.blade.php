@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
    <div><a href="{{route('empleados.create')}}" class="btn btn-primary">Crear Empleado</a></div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">Departamento</th>
            <th scope="col">Puesto</th>
            <th scope="col">Salario mensual</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <th scope="row">{{ $empleado->cedula }}</th>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->fecha_ingreso }}</td>
                <td>{{ $empleado->departamento->nombre }}</td>
                <td>{{ $empleado->puesto->nombre }}</td>
                <td>{{ $empleado->salario_mensual }}</td>
                <td>{{ $empleado->estado }}</td>
                <td><a href="{{route('empleados.edit', $empleado)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('empleados.destroy', $empleado)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $empleados->links() }}
@endsection
