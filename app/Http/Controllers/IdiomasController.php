<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Gate;

class IdiomasController extends Controller
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
        $idiomas = App\Idiomas::paginate(20);
        return view('idiomas.index', ['idiomas' => $idiomas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin-stuff');
        return view('idiomas.create');
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
        ]);
        App\Idiomas::create([
            'nombre' => $request->input('nombre'),
            'estado' => 'activo',
        ]);
        return redirect()->route('idiomas.index');
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
        $idioma = App\Idiomas::findOrFail($id);
        return view('idiomas.update', ['idioma' => $idioma]);
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
            'estado' => 'required|string',
            'nombre' => 'required|string',
        ]);
        $idiomas = App\Idiomas::findOrFail($id);
        $idiomas->update([
            'estado' => $request->input('estado'),
            'nombre' => $request->input('nombre'),
        ]);
        return redirect()->route('idiomas.index');
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
        $idiomas = App\Idiomas::findOrFail($id);
        $idiomas->delete();
        return redirect()->route('idiomas.index');
    }
}
