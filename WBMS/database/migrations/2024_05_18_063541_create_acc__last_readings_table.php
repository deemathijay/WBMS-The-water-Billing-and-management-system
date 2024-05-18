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
        Schema::create('acc__last_readings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Acc_id');
            $table->foreign('Acc_id')->references('id')->on('cus_accounts');
            $table->integer('LastReading');
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
        Schema::dropIfExists('acc__last_readings');
    }
};
