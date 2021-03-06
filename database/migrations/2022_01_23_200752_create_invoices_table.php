<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('siigo_id');
            $table->string('name');
            $table->string('customer_name')->nullable();
            $table->string('identification')->nullable();
            $table->string('address')->nullable();
            $table->string('country_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phones')->nullable();
            $table->date('date');
            $table->date('date_send')->nullable();
            $table->double('total');
            $table->double('boxes')->nullable();
            $table->double('weight')->nullable();
            $table->foreignId('customer_id')->constrained('customers')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
