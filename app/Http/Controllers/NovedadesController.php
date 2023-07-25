<?php

namespace App\Http\Controllers;

use App\Models\Novedades;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novedades = Novedades::all();
        $ban = 6;
        return view('novedades.index', compact('novedades', 'ban'));
    }

    public function index_tablero()
    {
        $novedades = Novedades::all();
        $ban = 6;
        return view('novedades.index_tablero', compact('novedades', 'ban'));
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
        $novedad = new Novedades();
        $novedad->novedad = $request->novedad;

        $novedad->save();
        return redirect('novedad_admin/');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nove = Novedades::find($id);
        $ban = 6;
        return view('novedades.editar_novedad', compact('nove', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $novedad = Novedades::find($id);
        $novedad->novedad = $request->novedad;

        $novedad->save();
        return redirect('novedad_admin/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nove = Novedades::find($id);
        $nove->delete();

        return redirect('novedad_admin/')->with('eliminar', 'ok');
    }
}
