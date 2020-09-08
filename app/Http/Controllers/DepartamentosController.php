<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class DepartamentosController extends Controller
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
        $departamentos = App\Departamentos::paginate(20);
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-stuff');
        return view('departamentos.create');
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
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);
        App\Departamentos::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('departamentos.index');
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
        $departamento = App\Departamentos::findOrFail($id);
        return view('departamentos.update', ['departamento' => $departamento]);
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
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);
        $departamento = App\Departamentos::findOrFail($id);
        $departamento->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('departamentos.index');
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
        $departamento = App\Departamentos::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
