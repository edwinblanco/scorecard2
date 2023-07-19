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
        $lista_productividad = Top_3_TAT::all();
        $ban = 1;
        return view('productividad.lista_top3_tat_admin', compact('lista_productividad', 'ban'));
    }

    public function index_tablero()
    {
        $lista_productividad = Top_3_TAT::all();
        $ban = 1;
        return view('productividad.lista_top3_tat', compact('lista_productividad', 'ban'));
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
        return view('productividad.editar_toptat', compact('top'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Top_3_TAT $top_3_TAT)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Top_3_TAT $top_3_TAT)
    {
        //
    }
}
