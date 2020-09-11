@extends('layouts.app')

@section('title', 'Competencias')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Competencias</h2>
        </div>
        <div class="col-2 text-right">
            <a href="{{route('competencias.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col" class="w-50px"></th>
                <th scope="col" class="w-50px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($competencias as $competencia)
                <tr>
                    <th scope="row">{{ $competencia->descripcion }}</th>
                    <td>{{ $competencia->estado }}</td>
                    <td class="px-0"><a href="{{route('competencias.edit', $competencia)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td class="px-0">
                        <form method="POST" action="{{route('competencias.destroy', $competencia)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $competencias->links() }}
    </div>
@endsection
