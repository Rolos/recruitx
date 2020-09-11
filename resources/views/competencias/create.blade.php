@extends('layouts.app')

@section('title', 'Crear Competencias')

@section('content')
    <div class="row mt-2 mb-4">
        <div class="col-12">
            <h2>Crear Competencias</h2>
        </div>
    </div>

    <form method="POST" action="{{route('competencias.store')}}">
        @csrf
        @include('includes.errors')
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input id="descripcion" type="text" name="descripcion" class="@error('descripcion') is-invalid @enderror form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </form>
@endsection
