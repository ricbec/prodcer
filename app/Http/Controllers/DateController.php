<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller
{
    //
    public static function dateF ($date){
        $date_parts = explode("-",$date);
        switch ((int)$date_parts[1]){
            case 1:
                $month = "Enero";
                break;
            case 2:
                $month = "Febrero";
                break;   
            case 3:
                $month = "Marzo";
                break;
            case 4:
                $month = "Abril";
                break; 
            case 5:
                $month = "Mayo";
                break;
            case 6:
                $month = "Junio";
                break;
            case 7:
                $month = "Julio";
                break; 
            case 8:
                $month = "Agosto";
                break;
            case 9:
                $month = "Septiembre";
                break;
            case 10:
                $month = "Octubre";
                break; 
            case 11:
                $month = "Noviembre";
                break;   
            case 12:
                $month = "Diciembre";
                break;  
            default:
                $month = (int)$date_parts[1];
                break;        
        }
        $datef = (int)$date_parts[2]." de ".$month." de ".(int)$date_parts[0];
        return($datef);
    }
}
