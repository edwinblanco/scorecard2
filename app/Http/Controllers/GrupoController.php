<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        $grupo_am = Grupo::where('tipo', 'horarioam')->exists();
        $grupo_pm = Grupo::where('tipo', 'horariopm')->exists();
        $grupo_alma = Grupo::where('tipo', 'almacenamiento')->exists();
        $grupo_fact = Grupo::where('tipo', 'facturacion')->exists();
        $grupo_tras = Grupo::where('tipo', 'trasporte')->exists();
        $grupo_tat = Grupo::where('tipo', 'tat')->exists();
        $grupo_mon = Grupo::where('tipo', 'monitoreo')->exists();
        $ban = 5;
        return view('grupos.index', compact('grupos', 'ban', 'grupo_am', 'grupo_pm', 'grupo_alma', 'grupo_fact', 'grupo_tras', 'grupo_tat', 'grupo_mon'));
    }

    public function index_tablero()
    {
        $grupo_am = Grupo::where('tipo', 'horarioam')->first();
        $grupo_pm = Grupo::where('tipo', 'horariopm')->first();
        $grupo_alma = Grupo::where('tipo', 'almacenamiento')->first();
        $grupo_fact = Grupo::where('tipo', 'facturacion')->first();
        $grupo_tras = Grupo::where('tipo', 'trasporte')->first();
        $grupo_tat = Grupo::where('tipo', 'tat')->first();
        $grupo_mon = Grupo::where('tipo', 'monitoreo')->first();
        $ban = 5;
        return view('grupos.index_tablero', compact(
            'ban', 'grupo_am', 'grupo_pm', 'grupo_alma', 'grupo_fact', 'grupo_tras', 'grupo_tat', 'grupo_mon'
        ));
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
    public function store(Request $request, $tipo)
    {
        $grupo = new Grupo();
        if($tipo == 'horarioam'){
            $grupo->nombre = "Horario AM";
        }elseif($tipo == 'horariopm'){
            $grupo->nombre = "Horario PM";
        }elseif($tipo == 'almacenamiento'){
            $grupo->nombre = "Almacenamiento";
        }elseif($tipo == 'facturacion'){
            $grupo->nombre = "Facturación";
        }elseif($tipo == 'trasporte'){
            $grupo->nombre = "Trasporte";
        }elseif($tipo == 'tat'){
            $grupo->nombre = "TAT";
        }elseif($tipo == 'monitoreo'){
            $grupo->nombre = "Monitoreo";
        }

        $grupo->tipo = $tipo;
        $grupo->horario = "NA";
        $grupo->save();

        return redirect()->route('grupos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        $personas = $grupo->personas;
        $ban = 5;
        return view('grupos.show', compact('grupo', 'personas', 'ban'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
