<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('admin.solicitud.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $clientes = Cliente::all();
         $servicios = Servicio::all();
        return view('admin.solicitud.create', compact('clientes', 'servicios'));
    }

    public function obtenerCliente($id){
        $cliente = Cliente::find($id);
    

        if (!$cliente){
            return response()->json(['error'=>'Cliente no encontrado']);
        }

        return response()->json($cliente);
    }

    public function obtenerServicio($id)
{
    $servicio = Servicio::find($id);

    if (!$servicio){
        return response()->json(['error'=>'Servicio no encontrado']);
    }

    return response()->json($servicio);
}
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'cliente_id' => 'required',
        'servicio_id' => 'required',
        'fecha_inicio' => 'required|date',
        'monto' => 'required|numeric|min:0',
        'metodo_pago' => 'required|string',
        
    ]);

    $comprobantePath = null;
    if ($request->hasFile('comprobante_pago')) {
        $comprobantePath = $request->file('comprobante_pago')->store('comprobantes', 'public');
    }

    $solicitud = new Solicitud();
    $solicitud->cliente_id = $request->cliente_id;
    $solicitud->servicio_id = $request->servicio_id;
    $solicitud->fecha_inicio = $request->fecha_inicio;
    $solicitud->monto = $request->monto;
    $solicitud->metodo_pago = $request->metodo_pago;
    $solicitud->estado_pago = 'pagado';
    $solicitud->save();

    $cliente = auth()->user(); // o cliente relacionado

    $pdf = Pdf::loadView('admin.pagos.comprobante', [
        'solicitud' => $solicitud,
        'cliente' => $cliente,

        
    ]);

    return $pdf->download("comprobante_pago_solicitud_{$solicitud->id}.pdf");

        

            
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Solicitud::destroy($id);

         return redirect()->route('admin.solicitud.index')
            ->with('mensaje', 'Se  elimino la solicitud de la manera correcta.')
            ->with('icono', 'success');
    }
}
