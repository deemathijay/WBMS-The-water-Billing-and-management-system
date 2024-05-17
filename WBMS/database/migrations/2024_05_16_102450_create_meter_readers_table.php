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
        Schema::create('meter_readers', function (Blueprint $table) {
            $table->id();
            $table->string('MTR_full_name');
            $table->string('MTR_NameInitials');
            $table->string('MTR_NIC');
            $table->string('MTR_Pwd');
            $table->string('MTR_Phone1');
            $table->string('MTR_Phone2')->default('0000000000');
            $table->text('MTR_Address');
            $table->enum('MTR_Gender', ['M', 'F']);
            $table->date('MTR_DOB');
            $table->string('MTR_Remark')->default('None');
            $table->unsignedBigInteger('Org_id');
            $table->foreign('Org_id')->references('id')->on('organization_details')->onDelete('cascade');
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
        Schema::dropIfExists('meter_readers');
    }
};
