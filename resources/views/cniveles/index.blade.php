@extends('layouts.app')

@section('title', 'Niveles de Capacitacion')

@section('content')
    <div><a href="{{route('cniveles.create')}}" class="btn btn-primary">Crear Nivel de Capacitacion</a></div>
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
        @foreach ($niveles as $nivel)
            <tr>
                <th scope="row">{{ $nivel->nombre }}</th>
                <td>{{ $nivel->descripcion }}</td>
                <td><a href="{{route('cniveles.edit', $nivel)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('cniveles.destroy', $nivel)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $niveles->links() }}
@endsection
