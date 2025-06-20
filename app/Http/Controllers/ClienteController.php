<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nro_documento' => 'required|unique:clientes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'celular' => 'required',
            
        ]);

        $cliente = new Cliente();
        $cliente->nro_documento = $request->nro_documento;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->direccion = $request->direccion;
        $cliente->genero = $request->genero;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->save();


        return redirect()->route('admin.clientes.create')
            ->with('mensaje', 'Se  registro al cliente de la manera correcta.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id); 
        return view('admin.clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $cliente = Cliente::find($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nro_documento' => 'required|unique:clientes,nro_documento,'.$id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'celular' => 'required',
            
        ]);
        $cliente = Cliente::find($id);
        $cliente->nro_documento = $request->nro_documento;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->direccion = $request->direccion;
        $cliente->genero = $request->genero;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->save();


        return redirect()->route('admin.clientes.index')
            ->with('mensaje', 'Se  actualizo los datos del  cliente de la manera correcta.')
            ->with('icono', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cliente::destroy($id);

        return redirect()->route('admin.clientes.index')
            ->with('mensaje', 'Se  elimino los datos  de la manera correcta')
            ->with('icono', 'success');
    }
}
