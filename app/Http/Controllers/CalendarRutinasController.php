<?php

namespace App\Http\Controllers;

use App\Models\CalendarRutinas;
use Illuminate\Http\Request;

class CalendarRutinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CalendarRutinas::all();
        //$events = Rutinas::all();
        $ban = 4;

        return view('rutinas.index', compact('events', 'ban'));
    }
    public function index_tablero()
    {
        $events = CalendarRutinas::all();
        //$events = Rutinas::all();
        $ban = 4;

        return view('rutinas.index_tablero', compact('events', 'ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        /*for ($i=0; $i < 2; $i++) {
            $ruti = new Rutinas();
            $ruti->fecha = "Sin definir";
            if($i==0){
                $ruti->horario = "am";
            }else{
                $ruti->horario = "pm";
            }
            $ruti->save();
        }*/

        $date = $request->input('date');
        $name = $request->input('name');
        $horario = $request->input('horario');
        $pasillo = $request->input('pasillo');

        $evento = new CalendarRutinas();
        $evento->fecha = $date;
        $evento->nombre = $name;
        $evento->horario = $horario;
        $evento->pasillo = $pasillo;

        $evento->save();

        return redirect()->route('calendar-ruti.index')->with('success', 'Persona asignada correctamente.');
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
    public function show(CalendarRutinas $calendarRutinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarRutinas $calendarRutinas)
    {
        //
    }
}
