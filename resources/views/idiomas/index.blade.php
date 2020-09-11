@extends('layouts.app')

@section('title', 'Idiomas')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Idiomas</h2>
        </div>
        <div class="col-2 text-right">
            <a href="{{route('idiomas.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col" class="w-50px"></th>
                <th scope="col" class="w-50px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($idiomas as $idioma)
                <tr>
                    <th scope="row">{{ $idioma->nombre }}</th>
                    <td>{{ $idioma->estado }}</td>
                    <td class="px-0"><a href="{{route('idiomas.edit', $idioma)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td class="px-0">
                        <form method="POST" action="{{route('idiomas.destroy', $idioma)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $idiomas->links() }}
    </div>

@endsection
