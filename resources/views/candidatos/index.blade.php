@extends('layouts.app')

@section('title', 'Candidatos')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Telefono</th>
            <th scope="col">Departamento</th>
            <th scope="col">Salario al que aspira</th>
            <th scope="col">Recomendado por</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($candidatos as $candidato)
            <tr>
                <th scope="row">{{ $candidato->cedula }}</th>
                <td>{{ $candidato->nombre }}</td>
                <td>{{ $candidato->telefono }}</td>
                <td>{{ $candidato->departamento->nombre }}</td>
                <td>{{ $candidato->salario_al_que_aspira }}</td>
                <td>{{ $candidato->recomendado_por }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $candidatos->links() }}
@endsection
