<!DOCTYPE html>
<html lang="es-CO">
    <body>
        <h1>Ingresar el número de la factura</h1>
        <p>El número será enviado para para recuperar los datos del cliente y de los productos
        </p>    
        <form method="POST" action="{{route('invoice')}}">
            @csrf
            <label for="invoice_name">Factura</label>
            <input name="invoice_name" type="text" placeholder="FV-2-123" required autofocus>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
