<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Controllers\DateController;


class LabelController extends Controller
{
    //
    public static function labelShow (Request $request){
      // dd(preg_replace('/\s+/', ' ', $request->phones));
       $boxes = $request->boxes;
       $weight = $request->weight;
       $invoice = Invoice::find($request->invoice_id);
       $invoice->date_send = $request->date_send;
       $invoice->weight =  $weight;
       $invoice->boxes = $boxes;
       $invoice->customer_name = $request->customer_name;
       $invoice->identification = $invoice->customer->identification;
       $invoice->address = $request->address;
       $invoice->city_name = $request->city_name;
       $invoice->state_name = $request->state_name;
       $invoice->postal_code = $request->postal_code;
       $invoice->phones = $request->phones;
       $invoice->save();
       ///ddd($request->datesend);
       $datef = DateController::dateF($request->date_send);
       $color = $request->color;
       $logo  = "Logo_".$color;
       //ddd($request);
       //ddd($datef);
       return view('labels')->with(compact('invoice','boxes','weight','datef','color','logo'));
    }
}
