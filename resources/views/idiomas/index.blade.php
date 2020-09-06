@extends('layouts.app')

@section('title', 'Idiomas')

@section('content')
    <div><a href="{{route('idiomas.create')}}" class="btn btn-primary">Crear Idiomas</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($idiomas as $idioma)
            <tr>
                <th scope="row">{{ $idioma->nombre }}</th>
                <td>{{ $idioma->estado }}</td>
                <td><a href="{{route('idiomas.edit', $idioma)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('idiomas.destroy', $idioma)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $idiomas->links() }}
@endsection
