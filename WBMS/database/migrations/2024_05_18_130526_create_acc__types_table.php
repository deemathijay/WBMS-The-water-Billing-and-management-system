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
        Schema::create('acc__types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Acc_id');
            $table->foreign('Acc_id')->references('id')->on('cus_accounts');
            $table->string('Type',1);
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
        Schema::dropIfExists('acc__types');
    }
};
