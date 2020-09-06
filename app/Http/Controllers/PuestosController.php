<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = App\Puestos::paginate(20);
        return view('puestos.index', ['puestos' => $puestos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puestos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'nivel_riesgo' => 'required|string|in:alto,medio,bajo',
            'min_salary' => 'required|numeric|lt:max_salary',
            'max_salary' => 'required|numeric|gt:min_salary',
        ]);
        App\Puestos::create([
            'nombre' => $request->input('nombre'),
            'nivel_riesgo' => $request->input('nivel_riesgo'),
            'salario_minimo' => $request->input('min_salary'),
            'salario_maximo' => $request->input('max_salary'),
            'estado' => 'activo',
        ]);
        return redirect()->route('puestos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = App\Puestos::findOrFail($id);
        return view('puestos.update', ['puesto' => $puesto]);
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
        $request->validate([
            'nombre' => 'required|string',
            'nivel_riesgo' => 'required|string|in:alto,medio,bajo',
            'min_salary' => 'required|numeric|lt:max_salary',
            'max_salary' => 'required|numeric|gt:min_salary',
            'estado' => 'required|in:activo,inactivo',
        ]);
        $puesto = App\Puestos::findOrFail($id);
        $puesto->update([
            'nombre' => $request->input('nombre'),
            'nivel_riesgo' => $request->input('nivel_riesgo'),
            'salario_minimo' => $request->input('min_salary'),
            'salario_maximo' => $request->input('max_salary'),
            'estado' => $request->input('estado'),
        ]);
        return redirect()->route('puestos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puestos = App\Puestos::findOrFail($id);
        $puestos->delete();
        return redirect()->route('puestos.index');
    }
}
