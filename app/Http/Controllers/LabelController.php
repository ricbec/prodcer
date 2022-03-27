<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Controllers\DateController;


class LabelController extends Controller
{
    //
    public static function labelShow (Request $request){
       $boxes = $request->boxes;
       $weight = $request->weight;
       $invoice = Invoice::find($request->invoice_id);
       $invoice->date_send = $request->date_send;
       $invoice->weight =  $weight;
       $invoice-> boxes = $boxes;
       $invoice->save();
       ///ddd($request->datesend);
       $datef = DateController::dateF($request->date_send);
       $color = $request->color;
       //ddd($request);
       //ddd($datef);
       return view('labels')->with(compact('invoice','boxes','weight','datef','color'));
    }
}
