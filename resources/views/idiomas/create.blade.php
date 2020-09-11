@extends('layouts.app')

@section('title', 'Crear Idiomas')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Crear Idiomas</h2>
        </div>
    </div>

    <form method="POST" action="{{route('idiomas.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </form>
@endsection
