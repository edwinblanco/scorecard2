<?php

namespace App\Http\Controllers;

use App\Models\Top_3_UNIDADES;
use Illuminate\Http\Request;

class Top3UNIDADESController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_productividad = Top_3_UNIDADES::all()->sortBy('top');
        $top3 = Top_3_UNIDADES::count();
        $ban = 1;
        return view('productividad.lista_top3_uni_admin', compact('lista_productividad', 'ban', 'top3'));
    }

    public function index_tablero()
    {
        $lista_productividad = Top_3_UNIDADES::all()->sortBy('top');
        $ban = 1;
        return view('productividad.lista_top3_uni', compact('lista_productividad', 'ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $top3 = Top_3_UNIDADES::count();
        for ($i=0; $i < 3-$top3; $i++) {
            $top = new Top_3_UNIDADES();
            $top->auxiliar = "Sin definir";
            $top->cajas = 0;
            $top->unidades = 0;
            $top->top = $i+1;
            $top->save();
        }

        return redirect('/top3uniadmin');
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
    public function show(Top_3_UNIDADES $top_3_UNIDADES)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $top = Top_3_UNIDADES::find($id);
        $ban = 1;
        return view('productividad.editar_topuni', compact('top', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $top = Top_3_UNIDADES::find($id);
        $top->auxiliar = $request->aux;
        $top->cajas = $request->cajas;
        $top->unidades = $request->unidades;
        $top->top = $request->top;

        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = 'CAJAS-'.time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $top->imagen_url = '/images/' . $imageName;
        }

        $top->save();

        return redirect('top3uniadmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Top_3_UNIDADES $top_3_UNIDADES)
    {
        //
    }
}
