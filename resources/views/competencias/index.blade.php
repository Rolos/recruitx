@extends('layouts.app')

@section('title', 'Competencias')

@section('content')
    <div><a href="{{route('competencias.create')}}" class="btn btn-primary">Crear Competencias</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($competencias as $competencia)
            <tr>
                <th scope="row">{{ $competencia->descripcion }}</th>
                <td>{{ $competencia->estado }}</td>
                <td><a href="{{route('competencias.edit', $competencia)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('competencias.destroy', $competencia)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $competencias->links() }}
@endsection
