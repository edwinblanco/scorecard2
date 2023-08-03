<?php

namespace App\Http\Controllers;

use App\Models\Top_3_TAT;
use Illuminate\Http\Request;

class Top3TATController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_productividad = Top_3_TAT::all()->sortBy('top');
        $top3 = Top_3_TAT::count();
        $ban = 1;
        return view('productividad.lista_top3_tat_admin', compact('lista_productividad', 'ban', 'top3'));
    }

    public function index_tablero()
    {
        $lista_productividad = Top_3_TAT::all()->sortBy('top');
        $ban = 1;
        return view('productividad.lista_top3_tat', compact('lista_productividad', 'ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $top3 = Top_3_TAT::count();
        for ($i=0; $i < 3-$top3; $i++) {
            $top = new Top_3_TAT();
            $top->auxiliar = "Sin definir";
            $top->cajas = 0;
            $top->unidades = 0;
            $top->top = $i+1;
            $top->save();
        }

        return redirect('/top3tatadmin');

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
    public function show(Top_3_TAT $top_3_TAT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $top = Top_3_TAT::find($id);
        $ban = 1;
        return view('productividad.editar_toptat', compact('top', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $top = Top_3_TAT::find($id);
        $top->auxiliar = $request->aux;
        $top->cajas = $request->cajas;
        $top->unidades = $request->unidades;
        $top->top = $request->top;

        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = 'TAT-'.time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $top->imagen_url = '/images/' . $imageName;
        }

        $top->save();

        return redirect('top3tatadmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Top_3_TAT $top_3_TAT)
    {
        //
    }
}
