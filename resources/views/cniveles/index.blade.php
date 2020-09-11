@extends('layouts.app')

@section('title', 'Niveles de Capacitacion')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Nivel de Capacitacion</h2>
        </div>
        <div class="col-2 text-right">
            <a href="{{route('cniveles.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col" class="w-50px"></th>
                <th scope="col" class="w-50px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($niveles as $nivel)
                <tr>
                    <th scope="row">{{ $nivel->nombre }}</th>
                    <td>{{ $nivel->descripcion }}</td>
                    <td class="px-0"><a href="{{route('cniveles.edit', $nivel)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    <td class="px-0">
                        <form method="POST" action="{{route('cniveles.destroy', $nivel)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $niveles->links() }}
    </div>
@endsection
