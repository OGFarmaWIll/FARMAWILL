<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nota de Venta</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; }
        .logo { width: 150px; }
        .title { font-size: 20px; font-weight: bold; }
        .info { margin-top: 10px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table, .table th, .table td {  }
        .table th, .table td { padding: 8px; text-align: left; }
        .total { text-align: right; margin-top: 10px; }
        .qr { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>



    <div class="container">
        <div class="header">
            <img src="{{ public_path('imagen-logo.jpg') }}" 
                class="logo" alt="Farmapro+" style="height: 200px; background-color: #f5f5f5;">
            <div class="title">BOTICA FARMAWILL</div>
            <div>RUC: 1006040409</div>
            <div>LIMA</div>
            <div>970975444</div>
            <div> <strong> BOLETA DE VENTA ELECTRONICA </strong> </div>
            <div>B001-{{ str_pad($venta->c_idventa, 6, '0', STR_PAD_LEFT) }}</div>

        </div>  

        <div class="info">
            <div><strong>Vendedor:</strong> Administrador FARMAWILL </div>
        </div>

        <div class="info">
            <div><strong>Fecha y Hora:</strong> {{ $venta->c_fecharegistro }}</div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>C.</th>
                    <th>Producto</th>
                    <th>P.U.</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalleVenta as $detalle)
                <tr>
                    <td>{{ $detalle['c_cantidad'] }}</td>
                    <td>{{ $detalle->producto->c_nombre ?? 'Sin nombre' }}</td>
                    <td>S/. {{ number_format($detalle['c_Preciounitario'], 2) }}</td>
                    <td>S/. {{ number_format($detalle['c_preciototal'], 2) }}</td>
                </tr>
                
                @endforeach

            </tbody>
        </table>

        <div class="total">
          
            <div style="margin-bottom: 10px" >Subtotal: S/. {{ number_format($venta->c_subtotal, 2) }}</div>
 
            <div style="margin-bottom: 10px" > Descuento: S/. {{ number_format($venta->c_descuento, 2) }}</div>

            <div style="margin-bottom: 10px" > IGV: S/. {{ number_format($venta->c_igv, 2) }} </div>

            <div style="margin-bottom: 10px" >Banco 5%: S/. 0.00</div>
            
            <div><strong>Total: S/. {{ number_format($venta->c_total, 2) }} </strong></div>
        </div>

        <div class="info">
            <div><strong>Pago:</strong> 
                {{ $venta->tipoPago->c_desc == 'Efectivo' ? 'Al contado' : $venta->tipoPago->c_desc }}
            </div>
            
            {{-- <div>Pagó con S/. 1 y su cambio es S/. 0.30</div> --}}
        </div>

        <div>
            <div class="qr">
                <img src="{{ public_path('imagen-logo.jpg') }}"
                    alt="QR" style="width: 100px; height: 100px;">
            </div>
        </div>

        <div style="text-align: center; font-family: Arial, sans-serif; font-size: 14px;">
            <span>Representación impresa de la Boleta de Venta Electrónica</span>
            <br><br>
            <span style="">
                UNA VEZ SALIDO EL PRODUCTO, NO SE ACEPTAN DEVOLUCIONES NI CAMBIOS
            </span>
            <br>
            <span>GRACIAS POR SU COMPRA</span>
            <br><br>
            Para consultar el comprobante ingresar a:  
            <br>
            <a href="https://ose.efact.pe/busca-tu-comprobante/consult.html" target="_blank">
                https://ose.efact.pe/busca-tu-comprobante/consult.html
            </a>
        </div>

        
    </div>
</body>
</html>
