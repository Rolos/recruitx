<div class="card my-3">
    <div class="card-body">
        <h5 class="card-title">
            Experiencia Laboral
            @can ('same-candidate', $candidato->id)
                <small class="text-muted">
                    <a href="{{route('candidates.experience.add', ['id' => $candidato->id])}}" class="link-icon">
                        <i class="fas fa-plus"></i>
                    </a>
                </small>
            @endcan
        </h5>

        @foreach ($candidato->experienciaLaboral as $experiencia)
            <ul class="list-group list-group-horizontal my-3">
                <li class="list-group-item"><strong>Empresa:</strong><br /> {{$experiencia->empresa}}</li>
                <li class="list-group-item"><strong>Puesto:</strong><br /> {{$experiencia->puesto->nombre}}</li>
                <li class="list-group-item"><strong>Fecha desde:</strong><br /> {{$experiencia->fecha_desde}}</li>
                <li class="list-group-item"><strong>Fecha hasta:</strong><br /> {{$experiencia->fecha_hasta}}</li>
                <li class="list-group-item"><strong>Salario:</strong><br /> {{$experiencia->salario}}</li>
                @can ('same-candidate', $candidato->id)
                    <li class="list-group-item">
                        <a href="{{route('candidates.experience.edit', ['id' => $candidato->id, 'experienceId' => $experiencia->id])}}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <form method="POST" action="{{route('candidates.experience.remove', ['id' => $candidato->id, 'experienceId' => $experiencia->id])}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </li>
                @endcan
            </ul>
        @endforeach
    </div>
</div>
