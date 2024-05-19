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
        Schema::create('water_bills', function (Blueprint $table) {
            $table->id();
            $table->decimal('Bill_Reading1',10,2);
            $table->decimal('Bill_Reading2',10,2);
            $table->decimal('Bill_Units',6,2);
            $table->decimal('Bill_ChargeUsedUits',8,2);
            $table->decimal('Bill_ServiceCharge',8,2);
            $table->decimal('Bill_BF',8,2);
            $table->decimal('Bill_Tax',8,2);
            $table->decimal('Bill_DisCount',8,2);
            $table->decimal('Bill_Installment',8,2);
            $table->decimal('Bill_Interest',8,2);
            $table->decimal('Bill_Total',8,2);
            $table->unsignedBigInteger('CusAcc_No');
            $table->foreign('CusAcc_No')->references('id')->on('cus_accounts');
            $table->unsignedBigInteger('MTR_id');
            $table->foreign('MTR_id')->references('id')->on('meter_readers');
            $table->unsignedBigInteger('Org_id');
            $table->foreign('Org_id')->references('id')->on('organization_details');
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
        Schema::dropIfExists('water_bills');
    }
};
