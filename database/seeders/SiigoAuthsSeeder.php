<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiigoAuthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siigo_auths')->insert([
            'access_token' => '',
            'expires_in' => 0,
        ]);
    }
}
