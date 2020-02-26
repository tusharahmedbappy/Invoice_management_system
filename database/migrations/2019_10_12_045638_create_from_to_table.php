<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFromToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('from_and_to', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_serial');
            $table->string('from_company');
            $table->string('from_company_owner');
            $table->string('from_company_address');

            $table->string('to_company');
            $table->string('to_company_owner');
            $table->string('to_company_address');
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
        Schema::dropIfExists('from_and_to');
    }
}
