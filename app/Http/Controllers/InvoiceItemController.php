<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    
    /**
     * Save Invoice Item from the request
     * @param $item
     * @return $item
     */
    public static function InvoiceItemrequest($items, $invoice_id){
       /* 
        * To make the object before save to not save?
        * do a temp table?
        */
        /*
       $invoice_items = array();
        
        foreach ($items as $item){
            $item_object = new InvoiceItem;
            $item_object->siigo_id= $item->id;
            $item_object->code= $item->code;
            $item_object->quantity= $item->quantity;
            $item_object->invoice_id= $invoice_id;
            
        }

        */
        InvoiceItem::where("invoice_id", $invoice_id)->delete();
        
        foreach ($items as $item){
            InvoiceItem::updateOrCreate([
                'siigo_id' => $item->id,
                'code' => $item->code,
                'quantity' => $item->quantity,
                'invoice_id' => $invoice_id,
            ]);
        }
      
        return;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceItem $invoiceItem)
    {
        //
    }
}
