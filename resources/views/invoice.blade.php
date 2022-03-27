<!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <body>
        <h1>Los datos de la factura</h1>
        <p>
        </p>    
        <form method="POST" action="{{route('labelShow')}}">
            @csrf
           @php
            //ddd($invoice->customer->phones);
           @endphp
            <div>
                <label for ="name">Número</label>
                <input name="name" type="text" required value="{{$invoice->name}}">
            </div>
            <div>
                <label for ="datef">Fecha factura</label>
                <input name="name" type="text" required value="{{$datef}}">
            </div>
            <div>
                <label for ="customer_name">Nombre </label>
                <input name="name" type="text" required 
                       value="@foreach(json_decode($invoice->customer->name) as $name){{$name}} @endforeach">
            </div>
            <div>
                <label for ="address">Dirección</label>
                <input name="address" type="text" required
                       value =" {{ $invoice->customer->address }}">
            </div>   
            <div>
                <label for ="city_name">Ciudad</label>
                <input name="city_name" type="text" required
                       value ="{{ $invoice->customer->city_name }}">
            </div>
            <div>
                <label for ="state_name">Departamento</label>
                <input name="state_name" type="text" required
                       value =" {{$invoice->customer->state_name}}">
                </div>
            <div>
                <label for ="phones">Teléfonos</label>
                <input name="state_name" type="text" required
                       value ="@foreach (json_decode($invoice->customer->phones) as $phone)@foreach ($phone as $phone_item){{ $phone_item }} @endforeach @endforeach">
            </div>
            <ul>
            @foreach ($invoice->items as $item)
                    <li>Producto {{ $item->code }} Cantidad {{ $item->quantity}}</li>
            @endforeach
            </ul>
            <div>
                <label for="boxes">Número de cajas</label>
                <input name="boxes" type="number" required autofocus>
                <input name="invoice_id" type="hidden" value="{{$invoice->id}}">
            </div>
            <div>
            <label for="weight">Peso total en KG</label>
                <input name="weight" type="number" required>
            </div>
            <div>
                <label for="color">Color</label>
                <select name="color" required>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="black">Negro</option>
                </select>
            </div>
            <div>
            <label for="date_send">Fecha Envío</label>
                <input name="date_send" type="date" value="{{date('Y-m-d')}}" lang="es" required>
            </div>
            <button type="submit">Guardar e imprimir</button>
        </form>
    </body>
</html>