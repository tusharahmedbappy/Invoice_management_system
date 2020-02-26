<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_no');
            $table->string('item_no');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->string('notice');
            $table->integer('subtotal');
            $table->integer('tax_rate');
            $table->float('tax_amount');
            $table->float('total_amount');
            $table->float('paid_amount');
            $table->float('due_amount');
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
        Schema::dropIfExists('invoice_data');
    }
}
