<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias = App\Competencias::paginate(20);
        return view('competencias.index', ['competencias' => $competencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competencias.create');
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
            'descripcion' => 'required|string',
        ]);
        App\Competencias::create([
            'descripcion' => $request->input('descripcion'),
            'estado' => 'activo',
        ]);
        return redirect()->route('competencias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competencias = App\Competencias::findOrFail($id);
        return view('competencias.update', ['competencia' => $competencias]);
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
            'estado' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $competencia = App\Competencias::findOrFail($id);
        $competencia->update([
            'estado' => $request->input('estado'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('competencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $competencias = App\Competencias::findOrFail($id);
        $competencias->delete();
        return redirect()->route('competencias.index');
    }
}
