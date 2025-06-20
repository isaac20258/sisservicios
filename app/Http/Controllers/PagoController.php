<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
                  //$pago = Pago::all();
       //  return view('admin.pagos.create', compact('pago'));
    
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
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    public function createCliente($solicitud_id)
{
    
    $solicitud = Solicitud::where('id', $solicitud_id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    return view('cliente.pagos.create', compact('solicitud','pago'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
