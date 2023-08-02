<?php

namespace App\Http\Controllers;

use App\Models\CalendarAseo;
use Illuminate\Http\Request;

class CalendarAseoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CalendarAseo::all();
        $ban = 2;

        return view('Aseo.index', compact('events', 'ban'));
    }

    public function index_tablero()
    {
        $events = CalendarAseo::all();
        $ban = 2;

        return view('Aseo.index_tablero', compact('events', 'ban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $date = $request->input('date');
        $name = $request->input('name');

        $evento = new CalendarAseo();
        $evento->fecha = $date;
        $evento->nombre = $name;

        $evento->save();

        return redirect()->route('calendar.index')->with('success', 'Persona asignada correctamente.');
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
    public function show($id)
    {
        $event = CalendarAseo::find($id);

        if (!$event) {
            return redirect()->route('Aseo.index')->with('error', 'Evento no encontrado.');
        }

        return view('Aseo.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarAseo $calendarAseo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $persona = $request->persona;
        $fecha = $request->fecha;

        $calendarAseo = CalendarAseo::find($id);

        $calendarAseo->nombre = $persona;
        $calendarAseo->fecha = $fecha;
        $calendarAseo->save();

        return redirect()->route('calendar.index')->with('success', 'Evento actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calendarAseo = CalendarAseo::find($id);
        $calendarAseo->delete();

        return redirect()->route('calendar.index')->with('success', 'Evento eliminado correctamente.');

    }
}
