<?php

namespace App\Http\Controllers;

use App\Models\TrenDespacho;
use App\Models\FechaTren;
use Illuminate\Http\Request;

class TrenDespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tren = TrenDespacho::all();
        $fecha = FechaTren::all()->first();
        $ban = 3;
        return view('tren.index', compact('tren', 'ban', 'fecha'));
    }

    public function index_tablero()
    {
        $tren = TrenDespacho::all();
        $fecha = FechaTren::all()->first();
        $ban = 3;
        return view('tren.index_tablero', compact('tren', 'ban', 'fecha'));
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
    public function store(Request $request)
    {
        $tren = new TrenDespacho();
        $tren->poblacion = $request->pobla;
        $tren->frecuencia = $request->frecu;
        $tren->diasCargue = $request->dias;

        $tren->save();
        return redirect('/trendmin');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrenDespacho $trenDespacho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tren = TrenDespacho::find($id);
        $ban = 3;
        return view('tren.editar_tren', compact('tren', 'ban'));
    }

    public function editmostrar($id, $mos)
    {
        $tren = TrenDespacho::find($id);
        if($mos == "1"){
            $tren->mostrar = true;
        }else{
            $tren->mostrar = false;
        }
        $tren->save();

        return redirect('/trendmin');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tren = TrenDespacho::find($id);
        $tren->poblacion = $request->pobla;
        $tren->frecuencia = $request->frecu;
        $tren->diasCargue = $request->dias;

        $tren->save();
        return redirect('/trendmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produc = TrenDespacho::find($id);
        $produc->delete();

        return redirect('/trendmin')->with('eliminar', 'ok');
    }
}
