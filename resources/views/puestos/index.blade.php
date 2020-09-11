@extends('layouts.app')

@section('title', 'Puestos')

@section('content')

    <div class="row mt-2 mb-4">
        <div class="col-10">
            <h2>Puestos</h2>
        </div>
        <div class="col-2 text-right">
            @can('admin-stuff')
                <div>
                    <a href="{{route('puestos.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</a>
                </div>
            @endcan
        </div>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel de Riesgo</th>
                <th scope="col">Salario Minimo</th>
                <th scope="col">Salario Maximo</th>
                @can('admin-stuff')
                    <th scope="col">Candidatos</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="w-50px"></th>
                    <th scope="col" class="w-50px"></th>
                    <th scope="col" class="w-50px"></th>
                @elsecan('candidate-stuff')
                    <th scope="col" class="w-50px"></th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach ($puestos as $puesto)
                <tr>
                    <th scope="row">{{ $puesto->nombre }}</th>
                    <th scope="row">{{ $puesto->nivel_riesgo }}</th>
                    <th scope="row">{{ $puesto->salario_minimo }}</th>
                    <th scope="row">{{ $puesto->salario_maximo }}</th>
                    @can('admin-stuff')
                        <td>{{ $puesto->candidatos->count() }}</td>
                        <td>{{ $puesto->estado }}</td>
                        <td class="px-0"><a href="{{route('puestos.show', $puesto)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                        <td class="px-0"><a href="{{route('puestos.edit', $puesto)}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                        <td class="px-0">
                            <form method="POST" action="{{route('puestos.destroy', $puesto)}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    @elsecan('candidate-stuff')
                        <td class="px-0">
                            @if (Auth::user()->candidato !== null)
                                @if(in_array($puesto->id, $puestos_aplicados))
                                    <a href="{{route('candidates.position.remove', ['id' => Auth::user()->candidato->id, 'puestoId' => $puesto->id])}}" class="btn btn-danger" title="Remover aplicacion">
                                        <i class="fas fa-user-minus"></i>
                                    </a>
                                @else
                                    <a href="{{route('candidates.position.apply', ['id' => Auth::user()->candidato->id, 'puestoId' => $puesto->id])}}" class="btn btn-primary" title="Aplicar">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                @endif
                            @else
                                <a class="link-icon" href="{{route('candidatos.create')}}" title="Crea tu resume para poder aplicar"><i class="fas fa-exclamation"></i></a>
                            @endif
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        @if (!isset($hide_links))
            {{ $puestos->links() }}
        @endif
    </div>

@endsection
