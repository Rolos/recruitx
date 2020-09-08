<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class EmpleadosController extends Controller
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
    public function index()
    {
        Gate::authorize('admin-stuff');
        $empleados = App\Empleados::where('estado', 'activo')->paginate(20);
        return view('empleados.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-stuff');
        return view('empleados.create', [
            'puestos' =>  App\Puestos::where('estado', 'activo')->get(),
            'departamentos' => App\Departamentos::all(),
        ]);
    }

    public function createFromCandidate($candidatoId)
    {
        Gate::authorize('admin-stuff');
        return view('empleados.create', [
            'puestos' =>  App\Puestos::where('estado', 'activo')->get(),
            'departamentos' => App\Departamentos::all(),
            'candidato' => App\Candidatos::findOrFail($candidatoId),
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
        Gate::authorize('admin-stuff');
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'fecha_ingreso' => 'required|date',
            'puesto' => 'required|exists:puestos,id',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
        ]);
        App\Empleados::create([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'puesto_id' => $request->input('puesto'),
            'departamento_id' => $request->input('departamento'),
            'salario_mensual' => $request->input('salario'),
            'candidato_id' => $request->input('candidato_id', null),
            'estado' => 'activo',
        ]);
        if ($request->has('candidato_id')) {
            $candidato = App\Candidatos::findOrFail($request->input('candidato_id'));
            $candidato->es_empleado = true;
            $candidato->save();
        }
        return redirect()->route('empleados.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('admin-stuff');
        $empleado = App\Empleados::findOrFail($id);
        return view('empleados.update', [
            'empleado' => $empleado,
            'puestos' =>  App\Puestos::where('estado', 'activo')->get(),
            'departamentos' => App\Departamentos::all(),
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
        Gate::authorize('admin-stuff');
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'fecha_ingreso' => 'required|date',
            'puesto' => 'required|exists:puestos,id',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
        ]);
        $empleado = App\Empleados::findOrFail($id);
        $empleado->update([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'puesto_id' => $request->input('puesto'),
            'departamento_id' => $request->input('departamento'),
            'salario_mensual' => $request->input('salario'),
            'estado' => $request->input('estado'),
        ]);
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('admin-stuff');
        $empleado = App\Empleados::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
