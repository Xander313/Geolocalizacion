<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
// importacion del modelo cliente
use Illuminate\Http\Request;

class ClienteControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consulta de lietneas a traves de la ase de datos
        $clientes=Cliente::all();
        //enviode datos a la vista
        return view('Clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //renderizando formulario para crear cliente

        return view('Clientes.nuevo');



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // se capturan los valires h luego se los guardam
        $datos=[
            'cedula'=>$request->cedula,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud

        ];
        Cliente::create($datos);
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado correctamente.');

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
        $cliente = Cliente::findOrFail($id);

        return view('Clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cedula' => 'required|string|max:20',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ]);
    
        $cliente = Cliente::findOrFail($id);

        $cliente->cedula = $request->cedula;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->latitud = $request->latitud;
        $cliente->longitud = $request->longitud;

        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
    /*
    rednerizado de los reportes con loas ubicaciones de todos los clientes
    */
    public function mapa(){
        $clientes=Cliente::all();
        

        return view('Clientes.mapa', compact('clientes'));
    }
}
