<?php

namespace App\Http\Controllers;

use App\Models\Top_3_CAJAS;
use Illuminate\Http\Request;

class Top3CAJASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_productividad = Top_3_CAJAS::all()->sortBy('top');
        $top3 = Top_3_CAJAS::count();
        $ban = 1;
        return view('productividad.lista_top3_caj_admin', compact('lista_productividad', 'ban', 'top3'));
    }

    public function index_tablero()
    {
        $lista_productividad = Top_3_CAJAS::all()->sortBy('top');
        $ban = 1;
        return view('productividad.lista_top3_caj', compact('lista_productividad', 'ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $top3 = Top_3_CAJAS::count();
        for ($i=0; $i < 3-$top3; $i++) {
            $top = new Top_3_CAJAS();
            $top->auxiliar = "Sin definir";
            $top->cajas = 0;
            $top->unidades = 0;
            $top->top = $i+1;
            $top->save();
        }

        return redirect('/top3cajadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Top_3_CAJAS $top_3_CAJAS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $top = Top_3_CAJAS::find($id);
        $ban = 1;
        return view('productividad.editar_topcaj', compact('top', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $top = Top_3_CAJAS::find($id);
        $top->auxiliar = $request->aux;
        $top->cajas = $request->cajas;
        $top->unidades = $request->unidades;
        $top->top = $request->top;

        $top->save();

        return redirect('top3cajadmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Top_3_CAJAS $top_3_CAJAS)
    {
        //
    }
}
