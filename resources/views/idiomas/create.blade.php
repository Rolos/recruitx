@extends('layouts.app')

@section('title', 'Crear Idiomas')

@section('content')
    <form method="POST" action="{{route('idiomas.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" class="@error('nombre') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
