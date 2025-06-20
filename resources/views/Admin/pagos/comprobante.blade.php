<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Pago</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .titulo {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .seccion {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="titulo">Comprobante de Pago</div>

    <div class="seccion">
        <p><span class="label">Fecha de emisión:</span> {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <div class="seccion">
        <p><span class="label">Cliente:</span> {{ $solicitud->cliente->nombres ?? '---' }}</p>
        <p><span class="label">Correo:</span> {{ $solicitud->cliente->email ?? '---' }}</p>
    </div>

    <div class="seccion">
        <p><span class="label">Servicio:</span> {{ $solicitud->servicio->nombre ?? '---' }}</p>
        <p><span class="label">Dirección:</span> {{ $solicitud->cliente->direccion }}</p>
        <p><span class="label">Fecha del servicio:</span> {{ \Carbon\Carbon::parse($solicitud->fecha_inicio)->format('d/m/Y') }}</p>
    </div>

    <div class="seccion">
        <table>
            <tr>
                <th>Método de pago</th>
                <th>Monto</th>
                <th>Estado</th>
            </tr>
            <tr>
                <td>{{ ucfirst($solicitud->metodo_pago) }}</td>
                <td>${{ number_format($solicitud->monto, 2) }}</td>
                <td>{{ ucfirst($solicitud->estado_pago) }}</td>
            </tr>
        </table>
    </div>

    <div class="seccion">
        <p>Gracias por tu confianza en nuestros servicios.</p>
    </div>

</body>
</html>
