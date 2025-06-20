<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $configuraciones = Configuracion::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'logo' => 'required'

        ]);

        $configuracion = new Configuracion();
        $configuracion->nombre = $request->nombre;
        $configuracion->descripcion = $request->descripcion;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->email = $request->email;
        $configuracion->logo = $request->file(key: 'logo')->store(path: 'logos', options: 'public');

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
    ->with('mensaje', 'Se registró la configuración de la manera correcta.')
    ->with('icono', 'success');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $configuracion = Configuracion::find($id); 
        return view('admin.configuraciones.show',compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracion::find($id); ;
        return view('admin.configuraciones.edit',compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            


        ]);

        $configuracion = Configuracion::find($id);
        $configuracion->nombre = $request->nombre;
        $configuracion->descripcion = $request->descripcion;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->email = $request->email;

        if ($request->hasFile('logo')){
             Storage::delete('public/'.$configuracion->logo);
             $configuracion->logo = $request->file(key: 'logo')->store(path: 'logos', options: 'public');

        }

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Se  actualizo la configuración de la manera correcta.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $configuracion = Configuracion::find($id);
        Storage::delete('public/'.$configuracion->logo);
        Configuracion::destroy($id);

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Se  elimino la configuración de la manera correcta.')
            ->with('icono', 'success');
    }
}
