<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('admin.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo' => 'required|',
            'estado' => 'required|',
        

        ]);

        $servicios = new Servicio();
        $servicios->nombre = $request->nombre;
        $servicios->descripcion = $request->descripcion;
        $servicios->costo = $request->costo;
        $servicios->estado = $request->estado;
        $servicios->save();




        return redirect()->route('admin.servicios.index')
            ->with('mensaje', 'Se  registro el servico de la manera correcta.')
            ->with('icono', 'success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $servicios = Servicio::find($id); 
        return view('admin.servicios.show',compact('servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $servicios = Servicio::find($id); 
        return view('admin.servicios.edit',compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo' => 'required',
            'estado' => 'required',
        

        ]);

        $servicios = Servicio::find($id);
        $servicios->nombre = $request->nombre;
        $servicios->descripcion = $request->descripcion;
        $servicios->costo = $request->costo;
        $servicios->estado = $request->estado;
        $servicios->save();




        return redirect()->route('admin.servicios.index')
            ->with('mensaje', 'Se  actualizo el servico de la manera correcta.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Servicio::destroy($id);

        return redirect()->route('admin.servicios.index')
            ->with('mensaje', 'Se  elimino el servico de la manera correcta.')
            ->with('icono', 'success');
    }
}
