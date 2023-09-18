<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Grupo;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Grupo $grupo)
    {
        $persona = new Persona();

        $persona->nombre =  $request->input('nombre');
        $persona->tipo = $request->input('tipo');

        $grupo->personas()->save($persona);

        return redirect()->route('grupos.show', $grupo)->with('success', 'Persona agregada exitosamente.')->with('ban', 5);
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo, $id)
    {
        $persona = Persona::find($id);

        if ($persona) {
            $persona->delete();
            return redirect()->route('grupos.show', $grupo)->with('success', 'Persona agregada exitosamente.')->with('ban', 5);
        } else {
            return redirect()->route('grupos.show', $grupo)->with('error', 'Persona no encontrada.')->with('ban', 5);
        }

    }
}
