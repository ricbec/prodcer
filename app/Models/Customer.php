<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
            'siigo_id',
            'name',
            'id_name',
            'identification',
            'check_digit',
            'address',
            'country_name',
            'state_name',
            'city_name',
            'postal_code',
            'phones'];
}
