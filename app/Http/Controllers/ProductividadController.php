<?php

namespace App\Http\Controllers;

use App\Models\Productividad;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_productividad = Productividad::all();
        $ban = 1;
        return view('productividad.lista_productividad_admin', compact('lista_productividad', 'ban'));
    }

    public function index_tablero()
    {
        $lista_productividad = Productividad::all();
        $ban = 1;
        return view('productividad.lista_productividad', compact('lista_productividad', 'ban'));
    }


    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx', // Asegúrate de validar el tipo de archivo correctamente
        ]);

        $file = $request->file('excel_file');

        // Procesar el archivo Excel
        try {

            Productividad::truncate();

            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            array_shift($rows); // Eliminar la primera fila si es el encabezado

            // Guardar los registros en la base de datos
            foreach ($rows as $row) {
                $productividad = new Productividad();
                $productividad->auxiliar = $row[0];
                $productividad->cajas = $row[1];
                $productividad->unidades = $row[2];
                $productividad->save();
            }

            return redirect('productividad_admin/')->with('success', 'Registros importados correctamente.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('productividad_admin/')->with('error', 'Error al procesar el archivo. Asegúrate de que el archivo Excel sea válido.');
        }
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
        $productividad = new Productividad();
        $productividad->auxiliar = $request->aux;
        $productividad->cajas = $request->cajas;
        $productividad->unidades = $request->unidades;

        $productividad->save();
        return redirect('productividad_admin/');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produ = Productividad::find($id);
        return view('productividad.editar_productividad', compact('produ'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produ = Productividad::find($id);
        $ban = 1;
        return view('productividad.editar_productividad', compact('produ', 'ban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $productividad = Productividad::find($id);
        $productividad->auxiliar = $request->aux;
        $productividad->cajas = $request->cajas;
        $productividad->unidades = $request->unidades;

        $productividad->save();
        return redirect('productividad_admin/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produc = Productividad::find($id);
        $produc->delete();

        return redirect('productividad_admin/')->with('eliminar', 'ok');
    }
}
