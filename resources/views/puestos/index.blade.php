@extends('layouts.app')

@section('title', 'Puestos')

@section('content')
    <div><a href="{{route('puestos.create')}}" class="btn btn-primary">Crear Puesto</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel de Riesgo</th>
                <th scope="col">Salario Minimo</th>
                <th scope="col">Salario Maximo</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($puestos as $puesto)
            <tr>
                <th scope="row">{{ $puesto->nombre }}</th>
                <th scope="row">{{ $puesto->nivel_riesgo }}</th>
                <th scope="row">{{ $puesto->salario_minimo }}</th>
                <th scope="row">{{ $puesto->salario_maximo }}</th>
                <td>{{ $puesto->estado }}</td>
                <td><a href="{{route('puestos.edit', $puesto)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('puestos.destroy', $puesto)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $puestos->links() }}
@endsection
