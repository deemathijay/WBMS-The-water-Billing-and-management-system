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
        Schema::create('agent__accounts', function (Blueprint $table) {
            $table->id();
            $table->string('AgtAcc_No',13);
            $table->integer('AgtAcc_Balance');
            $table->string('AgtAcc_Status',20);
            $table->string('AgtAcc_Remark',150);
            $table->unsignedBigInteger('Org_id');
            $table->foreign('Org_id')->references('id')->on('organization_details')->onDelete('cascade');
            $table->unsignedBigInteger('Agt_id');
            $table->foreign('Agt_id')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('agent__accounts');
    }
};
