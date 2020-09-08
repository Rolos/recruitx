<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Gate;

class CapacitacionesController extends Controller
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
        $capacitaciones = App\Capacitaciones::paginate(20);
        return view('capacitaciones.index', ['capacitaciones' => $capacitaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-stuff');
        $niveles = App\NivelesCapacitaciones::all();
        return view('capacitaciones.create', ['niveles' => $niveles]);
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
            'descripcion' => 'required|string',
            'nivel' => 'required|string|exists:niveles_capacitaciones,id',
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after:fecha_desde',
            'institucion' => 'required|string',
        ]);
        App\Capacitaciones::create([
            'descripcion' => $request->input('descripcion'),
            'nivel_id' => $request->input('nivel'),
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
            'institucion' => $request->input('institucion'),
        ]);
        return redirect()->route('capacitaciones.index');
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
        $capacitacione = App\Capacitaciones::findOrFail($id);
        $niveles = App\NivelesCapacitaciones::all();
        return view('capacitaciones.update', [
            'capacitacion' => $capacitacione,
            'niveles' => $niveles,
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
            'descripcion' => 'required|string',
            'nivel' => 'required|string|exists:niveles_capacitaciones,id',
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after:fecha_desde',
            'institucion' => 'required|string',
        ]);
        $capacitacion = App\Capacitaciones::findOrFail($id);
        $capacitacion->update([
            'descripcion' => $request->input('descripcion'),
            'nivel_id' => $request->input('nivel'),
            'fecha_desde' => $request->input('fecha_desde'),
            'fecha_hasta' => $request->input('fecha_hasta'),
            'institucion' => $request->input('institucion'),
        ]);
        return redirect()->route('capacitaciones.index');
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
        $capacitacion = App\Capacitaciones::findOrFail($id);
        $capacitacion->delete();
        return redirect()->route('capacitaciones.index');
    }
}
