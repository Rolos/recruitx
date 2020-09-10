<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Experiencia Laboral
                @can ('same-candidate', $candidato->id)
                    <small class="text-muted"><a href="{{route('candidates.experience.add', ['id' => $candidato->id])}}">Agregar</a></small>
                @endcan
            </h5>

            @foreach ($candidato->experienciaLaboral as $experiencia)
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><strong>Empresa:</strong> {{$experiencia->empresa}}</li>
                    <li class="list-group-item"><strong>Puesto:</strong> {{$experiencia->puesto->nombre}}</li>
                    <li class="list-group-item"><strong>Fecha desde:</strong> {{$experiencia->fecha_desde}}</li>
                    <li class="list-group-item"><strong>Fecha hasta:</strong> {{$experiencia->fecha_hasta}}</li>
                    <li class="list-group-item"><strong>Salario:</strong> {{$experiencia->salario}}</li>
                    @can ('same-candidate', $candidato->id)
                        <li class="list-group-item">
                            <a href="{{route('candidates.experience.edit', ['id' => $candidato->id, 'experienceId' => $experiencia->id])}}" class="btn btn-primary">
                                Editar
                            </a>
                        </li>
                        <li class="list-group-item">
                            <form method="POST" action="{{route('candidates.experience.remove', ['id' => $candidato->id, 'experienceId' => $experiencia->id])}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Borrar</button>
                            </form>
                        </li>
                    @endcan
                </ul>
            @endforeach
        </div>
    </div>
</div>
