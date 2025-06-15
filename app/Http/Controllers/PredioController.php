<?php

namespace App\Http\Controllers;


use App\Models\Predio;


use Illuminate\Http\Request;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //consulta de lietneas a traves de la ase de datos
        $predios=Predio::all();
        //enviode datos a la vista
        return view('Predio.index', compact('predios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Predio.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos=[
            'propietario'=>$request->propietario,
            'claveCatastral'=>$request->clave,
            'latitud1'=>$request->latitud1,
            'longitud1'=>$request->longitud1,
            'latitud2'=>$request->latitud2,
            'longitud2'=>$request->longitud2,
            'latitud3'=>$request->latitud3,
            'longitud3'=>$request->longitud3,
            'latitud4'=>$request->latitud4,
            'longitud4'=>$request->longitud4

        ];
        Predio::create($datos);
        return redirect()->route('predios.index')->with('success', 'Predio agregado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $predio = Predio::findOrFail($id);

        return view('Predio.editar', compact('predio'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'propietario' => 'required|string|max:20',
            'clave' => 'required|string|max:100',
            'latitud1' => 'required|numeric',
            'longitud1' => 'required|numeric',
            'latitud2' => 'required|numeric',
            'longitud2' => 'required|numeric',
            'latitud3' => 'required|numeric',
            'longitud3' => 'required|numeric',
            'latitud4' => 'required|numeric',
            'longitud4' => 'required|numeric'
        ]);
    
        $predio = Predio::findOrFail($id);

        $predio->propietario = $request->propietario;
        $predio->claveCatastral = $request->clave;
        $predio->latitud1 = $request->latitud1;
        $predio->longitud1 = $request->longitud1;
        $predio->latitud2 = $request->latitud2;
        $predio->longitud2 = $request->longitud2;
        $predio->latitud3 = $request->latitud3;
        $predio->longitud3 = $request->longitud3;
        $predio->latitud4 = $request->latitud4;
        $predio->longitud4 = $request->longitud4;

        $predio->save();

        return redirect()->route('predios.index')->with('success', 'Predio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $predio = Predio::findOrFail($id);
        $predio->delete();
        
        return redirect()->route('predios.index')->with('success', 'Predio eliminado correctamente.');
    }
}
