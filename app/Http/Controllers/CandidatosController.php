<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CandidatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Gate::authorize('admin-stuff');
        $candidatos = App\Candidatos::cedula($request)
            ->nombre($request)
            ->telefono($request)
            ->departamentos($request)
            ->puestos($request)
            ->capacitaciones($request)
            ->competencias($request)
            ->idiomas($request)
            ->paginate(20);
        $request->flash();
        return view('candidatos.index', [
            'candidatos' => $candidatos,
            'departamentos' => App\Departamentos::all(),
            'puestos' => App\Puestos::where('estado', 'activo')->get(),
            'capacitaciones' => App\Capacitaciones::all(),
            'competencias' => App\Competencias::where('estado', 'activo')->get(),
            'idiomas' => App\Idiomas::where('estado', 'activo')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('candidate-stuff');
        if (Auth::user()->candidato != null) {
            return redirect()->route('candidatos.show',  Auth::user()->candidato);
        }
        return view('candidatos.create', [
            'departamentos' => App\Departamentos::all(),
            'capacitaciones' => App\Capacitaciones::all(),
            'competencias' => App\Competencias::where('estado', 'activo')->get(),
            'idiomas' => App\Idiomas::where('estado', 'activo')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('candidate-stuff');
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
            'recomendado' => 'required|string',
            'capacitaciones' => 'required:array',
            'competencias' => 'required:array',
            'idiomas' => 'required:array',
            'telefono' => 'required|numeric'
        ]);
        $candidato = App\Candidatos::create([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'departamento_id' => $request->input('departamento'),
            'salario_al_que_aspira' => $request->input('salario'),
            'recomendado_por' => $request->input('recomendado'),
            'user_id' => Auth::id(),
        ]);
        $candidato->competencias()->sync($request->get('competencias'));
        $candidato->capacitaciones()->sync($request->get('capacitaciones'));
        $candidato->idiomas()->sync($request->get('idiomas'));
        if ($request->has('crear_y_experiencia')) {
            return redirect()->route('candidates.experience.add', ['id' => $candidato->id]);
        }
        return redirect()->route('candidatos.show', $candidato);
    }

    public function show($id)
    {
        $candidato = App\Candidatos::findOrFail($id);
        return view('candidatos.show', ['candidato' => $candidato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('candidate-stuff');
        $candidato = App\Candidatos::findOrFail($id);
        $candidato_competencias = $candidato->competencias->map(function ($item) {
            return $item->id;
        });
        $candidato_capacitaciones = $candidato->capacitaciones->map(function ($item) {
            return $item->id;
        });
        $candidato_idiomas = $candidato->idiomas->map(function ($item) {
            return $item->id;
        });
        return view('candidatos.update', [
            'candidato' => $candidato,
            'departamentos' => App\Departamentos::all(),
            'capacitaciones' => App\Capacitaciones::all(),
            'competencias' => App\Competencias::where('estado', 'activo')->get(),
            'idiomas' => App\Idiomas::where('estado', 'activo')->get(),
            'candidato_competencias' => $candidato_competencias->toArray(),
            'candidato_capacitaciones' => $candidato_capacitaciones->toArray(),
            'candidato_idiomas' => $candidato_idiomas->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('candidate-stuff');
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
            'recomendado' => 'required|string',
            'capacitaciones' => 'required:array',
            'competencias' => 'required:array',
            'idiomas' => 'required:array',
            'telefono' => 'required|numeric',
        ]);
        $candidato = App\Candidatos::findOrFail($id);
        $candidato->update([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'departamento_id' => $request->input('departamento'),
            'salario_al_que_aspira' => $request->input('salario'),
            'recomendado_por' => $request->input('recomendado'),
        ]);
        $candidato->competencias()->sync($request->get('competencias'));
        $candidato->capacitaciones()->sync($request->get('capacitaciones'));
        $candidato->idiomas()->sync($request->get('idiomas'));
        return redirect()->route('candidatos.show', $candidato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('candidate-stuff');
        $candidatos = App\Candidatos::findOrFail($id);
        $candidatos->delete();
        return redirect()->route('puestos.index');
    }

    public function addExperience($id)
    {
        Gate::authorize('candidate-stuff');
        $candidato = App\Candidatos::findOrFail($id);
        return view('candidatos.create_experience', [
            'candidato' => $candidato,
            'puestos' =>  App\Puestos::where('estado', 'activo')->get(),
        ]);
    }

    public function storeExperience(Request $request, $id)
    {
        Gate::authorize('candidate-stuff');
        $request->validate([
            'empresa' => 'required|string',
            'puesto_ocupado' => 'required|exists:puestos,id',
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after:fecha_desde',
            'salario' => 'required|numeric',
        ]);
        App\ExperienciaLaboral::create([
            'candidato_id' => $id,
            'empresa' => $request->input('empresa'),
            'puesto_ocupado_id' => $request->input('puesto_ocupado'),
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
            'salario' => $request->input('salario'),
        ]);
        return redirect()->route('candidatos.edit', ['candidato' => $id]);
    }

    public function removeExperience($id, $experienceId)
    {
        Gate::authorize('candidate-stuff');
        $experiencia = App\ExperienciaLaboral::findOrFail($experienceId);
        $experiencia->delete();
        return redirect()->route('candidatos.edit', ['candidato' => $id]);
    }

    public function editExperience($id, $experienceId)
    {
        Gate::authorize('candidate-stuff');
        $candidato = App\Candidatos::findOrFail($id);
        $experience = App\ExperienciaLaboral::findOrFail($experienceId);
        return view('candidatos.update_experience', [
            'candidato' => $candidato,
            'puestos' =>  App\Puestos::where('estado', 'activo')->get(),
            'experiencia' => $experience,
        ]);
    }

    public function updateExperience(Request $request, $id, $experienceId)
    {
        Gate::authorize('candidate-stuff');
        $request->validate([
            'empresa' => 'required|string',
            'puesto_ocupado' => 'required|exists:puestos,id',
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after:fecha_desde',
            'salario' => 'required|numeric',
        ]);
        $experiencia = App\ExperienciaLaboral::findOrFail($experienceId);
        $experiencia->update([
            'candidato_id' => $id,
            'empresa' => $request->input('empresa'),
            'puesto_ocupado_id' => $request->input('puesto_ocupado'),
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
            'salario' => $request->input('salario'),
        ]);
        return redirect()->route('candidatos.edit', ['candidato' => $id]);
    }

    public function aplicarPuesto($id, $puestoId)
    {
        Gate::authorize('candidate-stuff');
        $candidato = App\Candidatos::findOrFail($id);
        $candidato->puestos()->attach($puestoId);
        return redirect()->route('puestos.index');
    }

    public function removerPuesto($id, $puestoId)
    {
        Gate::authorize('candidate-stuff');
        $candidato = App\Candidatos::findOrFail($id);
        $candidato->puestos()->detach($puestoId);
        return redirect()->route('puestos.index');
    }
}
