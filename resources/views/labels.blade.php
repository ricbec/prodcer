<!DOCTYPE html>
<html>
    <head>
       
        <style>
            div {
                color: {{$color}};
            }
           
            table{
                width:27cm;
               
            }

            .table-head{
                margin-top: 1cm;
            }
            .table-container {
                margin-top:  0.5cm;
                border-style:solid;
                border-width: thin;
                border-color: {{$color}};
            }
            .table-container2 {
                border-style:solid;
                border-width: thin;
                border-top: none;
                border-color: {{$color}};
            }

            .column-left {
                width:10cm;
                border-right:thin solid;
                border-color: {{$color}};
            }

            .column-left2 {
                width:3.5cm;
              
            }

            .column-right {
                border-left:thin solid {{$color}};
            }

            .row-top {
                border-top:thin solid {{$color}};
            }

            .row-height {
                height:2.5cm;
            }
            .center {
                display:block;
                margin:auto;
            }

            .title {
                text-align:center;
                font-family: Arial;
                font-size: 14pt;
            }

            .title2 {
                text-align:center;
                font-family: Arial;
                font-size: 14pt;
                font-weight: bold;
                text-decoration: underline;
            }

            .title3 {
                text-align:center;
                font-family: Arial;
                font-size: 18pt;
                font-weight: bold;
                text-decoration: underline;
            }

            .title4 {
                text-align:center;
                font-family: Arial;
                font-size: 18pt;
            }

            .bold-span {
                font-weight: bold;
            }
            
            .bold-span2 {
                font-weight: bold;
                font-size: 20pt;
            }
            
            .text {
                text-align:center;
                font-family: Arial;
                font-size: 14pt;
            }

            .text2 {
                text-align:center;
                font-family: Times serif;
                font-size: 14pt;
            }

            .text3 {
                text-align:center;
                font-family: Times serif;
                font-size: 26pt;
            }

            .text-date {
                text-align:center;
                font-family: Arial;
                font-size: 16pt;
            }
            .pagebreak { page-break-before: always; }
           
        </style>
    </head>
    <body>
        @for ($i = 1; $i <= $boxes; $i++)
         
        
            <table class = "table-head">
                <tr>
                    <th>
                        <img class="center" 
                            src="{{ asset('storage/'.$logo.'.png');}}">
                    </th>
                </tr>
                <tr>
                    <td>
                        <div class="title">
                            Jorge Pérez Botía
                        </div>
                    <td>
                </tr>
                <tr>
                    <td>
                        <div
                            class="title">
                            www.productosceramicos.com
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table-container">
                <tr>
                    <td class="column-left">
                        <div style="padding:0.37cm">
                            <div class="title2">
                                REMITENTE
                            </div>
                            <div class="text">
                                PRODUCTOS CERÁMICOS<br/>
                                Jorge E. Pérez Botía.  C.C 9.511.533<br/>
                                Vereda Tíquiza, Chía (Cund.)<br/>
                                Cel. 3219000000 - Tel. (1) 8623837
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="padding:0.37cm">
                            <div class="title2">
                                DESTINATARIO
                            </div>
                            <div class="text">
                                
                                    {{ $invoice->customer_name}}
                                
                                <br/>
                                {{ $invoice->address }}
                                <br/>
                                <span class="bold-span">{{ $invoice->city_name }}</span>
                                <span class="bold-span">{{ $invoice->state_name}}</span>
                                <br/>Tel. {{ $invoice->phones}}

                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table-container2">
                <tr>
                    <td>
                    <div class="title3"> MERCANCÍA</div>
                    <div class="title4">
                        Peso: 
                        <span class="bold-span">{{$weight}}</span> 
                        Kg.    Total de cajas: {{$boxes}}  Caja Nº 
                        <span class="bold-span">{{$i}} / {{$boxes}}</span> 
                        Valor: $ 
                        <span class="bold-span">{{number_format($invoice->total,0,",",".")}}</span>
                    </div>
                    </td>
            </tr>
            </table>
            <table class="table-container2">
                <tr>
                    <td>
                        <div class="title2">PEDIDO</div>
                        <div class="text-date">{{$datef}}</div>
                    </td>
                </tr>
            </table>
            <table class="table-container2">
                <tr class="row-height">
                    <td>
                        <div class="title">PRODUCTO</div>
                    </td>
                    @foreach ($invoice->items as $item)
                        <td class="column-right">
                            <div class="text2">{{ $item->code }}</div>
                        </td>
                    @endforeach
                </tr>
                <tr class="row-height">
                    <td class="column-left2 row-top">
                        <div class="title">CANTIDAD</div>
                    </td>
                    @foreach ($invoice->items as $item)
                        <td class="column-right row-top">
                            <div class="text3">{{ $item->quantity}}</div>
                        </td>
                    @endforeach
                </tr>
            </table>
              
                <div class="pagebreak"></div>
               
        @endfor        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>