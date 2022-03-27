<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('siigo_id');
            $table->string('name');
            $table->string('id_name');
            $table->string('identification');
            $table->string('check_digit');
            $table->string('address');
            $table->string('country_name');
            $table->string('state_name');
            $table->string('city_name');
            $table->string('postal_code');
            $table->string('phones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
