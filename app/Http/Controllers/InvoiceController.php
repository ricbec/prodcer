<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SiigoAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\DateController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    
    public static function invoiceRequest (Request $request){
        $token = SiigoAuthController::token_valid ();
        $curl = curl_init();
        $invoice_name = $request->invoice_name;
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.siigo.com/v1/invoices?name='.$invoice_name,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token->access_token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        //ddd($response);
        if ($response == NULL){
            $response= new \stdClass();
            $response->Status = "No hubo respuesta del servidor de Siigo";
            $response->Errors = [];
        }
        if (isset($response->Status)){
            return view ('error')->with(compact('response'));
        }
        if (count($response->results)==0){
            $response= new \stdClass();
            $response->Status = "No se encontró la factura ".$invoice_name;
            $response->Errors = [];
            return view ('error')->with(compact('response'));
        }
        
        $siigo_id = $response->results[0]->id;
        $name = $response->results[0]->name;
        $date = $response->results[0]->date;
        //ddd($date);
        $datef = DateController::DateF($date);
        //ddd($datef);
        $customer_siigo_id = $response->results[0]->customer->id;
        $total = $response->results[0]->total;

        $customer = CustomerController::customerRequest($customer_siigo_id);

        /*$invoice = new Invoice;
            $invoice->siigo_id= $siigo_id;
            $invoice->name=$name; 
            $invoice->date=$date; 
            $invoice->customer_id= $customer->id;
            $invoice->total= $total;
        */
        
        $invoice = Invoice::updateOrCreate(
            [   
            'siigo_id'=> $siigo_id,
            'name'=>$name, 
            'date'=>$date, 
            'customer_id' => $customer->id,
            'total' => $total,
            ]
        );
        
        InvoiceItemController::InvoiceItemrequest($response->results[0]->items, $invoice->id);
            //ddd( InvoiceItemController::InvoiceItemrequest($item, $invoice->id));
        
       //ddd($invoice);
       // $invoice->customer = $invoice->customer()->first()->get();
       // $invoice->items = $invoice->items()->get();
        return view ('invoice')->with(compact ('invoice','datef'));
        
    }

    

    
}
