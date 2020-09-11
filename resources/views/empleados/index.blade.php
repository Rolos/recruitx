@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Empleados</h2>
        </div>
        <div class="col-2 text-right">
            <a href="{{route('empleados.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
        </div>
    </div>

    <form class="form-inline mb-4 position-relative">
        <label for="initial_date" class="mr-2">Fecha Inicial</label>
        <input type="date" class="form-control mr-3" id="initial_date" name="initial_date" value="{{ old('initial_date') }}">

        <label for="final_date" class="mr-2">Fecha Final</label>
        <input type="date" class="form-control mr-3" id="final_date" name="final_date" value="{{ old('final_date') }}">

        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>

        <button type="submit" name="csv_download" class="btn btn-secondary position-absolute csv_download">
            <i class="fas fa-file-download"></i> Descargar CSV
        </button>
    </form>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Departamento</th>
                <th scope="col">Puesto</th>
                <th scope="col">Salario mensual</th>
                <th scope="col">Estado</th>
                <th scope="col" class="w-50px"></th>
                <th scope="col" class="w-50px"></th>
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
                    <td class="px-0"><a href="{{route('empleados.edit', $empleado)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td class="px-0">
                        <form method="POST" action="{{route('empleados.destroy', $empleado)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $empleados->links() }}
    </div>

@endsection
