@extends('layouts.app')

@section('title', 'Departamentos')

@section('content')
    <div><a href="{{route('departamentos.create')}}" class="btn btn-primary">Crear Departamento</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($departamentos as $departamento)
            <tr>
                <th scope="row">{{ $departamento->nombre }}</th>
                <td>{{ $departamento->descripcion }}</td>
                <td><a href="{{route('departamentos.edit', $departamento)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('departamentos.destroy', $departamento)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $departamentos->links() }}
@endsection
