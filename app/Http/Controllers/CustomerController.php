<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SiigoAuthController;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //Called by Invoice Controller
    public static function customerRequest($siigo_id){
        
        $token = SiigoAuthController::token_valid ();
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.siigo.com/v1/customers/'.$siigo_id,
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
    $customer = Customer::updateOrCreate(
            [
            'siigo_id'=> $siigo_id,
            'name' => json_encode($response->name),
            'id_name' => $response->id_type->name,
            'identification'=>$response->identification,            
            'check_digit'=>$response->check_digit,
            'address'=>$response->address->address,
            'country_name'=>$response->address->city->country_name,
            'state_name'=>$response->address->city->state_name,
            'city_name'=>$response->address->city->city_name,
            'postal_code'=>$response->address->postal_code,
            'phones'=>json_encode($response->phones)
            ]
    );
    return($customer);
    }
}
