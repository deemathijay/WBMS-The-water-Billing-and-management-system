<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cus__installments', function (Blueprint $table) {
            $table->id();
            $table->integer('Ins_Premium_amount');
            $table->integer('Ins_NoOfPremium');
            $table->integer('Ins_NoOfRemain');
            $table->unsignedBigInteger('CusAcc_id');
            $table->foreign('CusAcc_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('cus__installments');
    }
};
