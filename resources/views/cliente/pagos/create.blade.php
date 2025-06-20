@extends('layouts.app') {{-- o tu layout principal del cliente --}}
@section('content')
<h2>Registrar Pago</h2>
<form action="{{ route('pagos.store', $solicitud->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Monto:</label>
    <input type="number" name="monto" step="0.01" required><br>

    <label>Método de pago:</label>
    <select name="metodo" required>
        <option value="efectivo">Efectivo</option>
        <option value="tarjeta">Tarjeta</option>
        <option value="transferencia">Transferencia</option>
    </select><br>

    <label>Comprobante:</label>
    <input type="file" name="comprobante"><br>

    <button type="submit">Enviar pago</button>
</form>
@endsection
