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
        Schema::create('agt_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('AgtTrs_id',20);
            $table->unsignedBigInteger('Reload_is')->nullable();
            $table->unsignedBigInteger('Payment_id')->nullable();
            $table->unsignedBigInteger('Agt_id');
            $table->foreign('Agt_id')->references('id')->on('agents');
            $table->unsignedBigInteger('AgtAcc_id');
            $table->foreign('AgtAcc_id')->references('id')->on('agent__accounts');
            $table->string('AgtTrs_remark',200);
            $table->integer('AgtTrs_Amount');
            $table->integer('AgtTrs_Balance');
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
        Schema::dropIfExists('agt_transactions');
    }
};
