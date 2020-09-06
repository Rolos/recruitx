<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = App\Candidatos::paginate(20);
        return view('candidatos.index', ['candidatos' => $candidatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatos.create', [
            'puestos' =>  App\Puestos::all(),
            'departamentos' => App\Departamentos::all(),
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
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'puesto' => 'required|exists:puestos,id',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
            'recomendado' => 'required|string',
        ]);
        App\Candidatos::create([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'puesto_al_que_aspira_id' => $request->input('puesto'),
            'departamento_id' => $request->input('departamento'),
            'salario_al_que_aspira' => $request->input('salario'),
            'recomendado_por' => $request->input('recomendado'),
        ]);
        return redirect()->route('candidatos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidato = App\Candidatos::findOrFail($id);
        return view('candidatos.update', [
            'candidato' => $candidato,
            'puestos' =>  App\Puestos::all(),
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
        $request->validate([
            'cedula' => 'required|string|size:11',
            'nombre' => 'required|string',
            'puesto' => 'required|exists:puestos,id',
            'departamento' => 'required|exists:departamentos,id',
            'salario' => 'required|numeric',
            'recomendado' => 'required|string',
        ]);
        $candidato = App\Candidatos::findOrFail($id);
        $candidato->update([
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'puesto_al_que_aspira_id' => $request->input('puesto'),
            'departamento_id' => $request->input('departamento'),
            'salario_al_que_aspira' => $request->input('salario'),
            'recomendado_por' => $request->input('recomendado'),
        ]);
        return redirect()->route('candidatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidatos = App\Candidatos::findOrFail($id);
        $candidatos->delete();
        return redirect()->route('candidatos.index');
    }
}
