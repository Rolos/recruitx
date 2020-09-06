<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class IdiomasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $idiomas = App\Idiomas::findOrFail($id);
        $idiomas->delete();
        return redirect()->route('idiomas.index');
    }
}
