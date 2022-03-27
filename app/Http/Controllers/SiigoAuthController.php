<?php

namespace App\Http\Controllers;
use App\Models\SiigoAuth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SiigoAuthController extends Controller
{
    public static function token_valid () {
        //Get the token from the database
        $token = SiigoAuth::FindorFail(1);
        $valid = now()->DiffinSeconds(Carbon::parse($token->updated_at));
        
        // Check if the token is less than 86000 seconds old
        if ($valid > 86000 or $token->expires_in == 0){
            $response = self::auth();
            $token->access_token = $response->access_token;
            $token->expires_in = $response->expires_in;
            $token->save();
        }
        return $token;
        //ddd($token, $response, $valid);
    }
    
    public static function auth (){
        // Get a new token for API authentication
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.siigo.com/auth',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "username": "'.env('SIIGO_USERNAME').'",
                "access_key": "'.env('SIIGO_ACCESS_KEY').'"
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        $response =json_decode($response);
        return($response); 
    }
}
