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
        Schema::create('reg_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('RegFee_Amount');
            $table->integer('RegFee_RegFee');
            $table->integer('RegFee_GovTax');
            $table->integer('RegFee_Handling');
            $table->integer('RegFee_Other');
            $table->integer('RegFee_Total');
            $table->unsignedBigInteger('CusAcc_id');
            $table->foreign('CusAcc_id')->references('id')->on('cus_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('reg_fees');
    }
};
