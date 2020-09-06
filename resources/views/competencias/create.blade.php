@extends('layouts.app')

@section('title', 'Crear Competencias')

@section('content')
    <form method="POST" action="{{route('competencias.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
