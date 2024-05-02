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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Cus_id',10);
            $table->string('Cus_FullName',300);
            $table->string('Cus_NameInitials',100);
            $table->string('Cus_Address',300);
            $table->string('Cus_NIC',15);
            $table->string('Cus_Gender',2);
            $table->string('Cus_Phone1',12);
            $table->string('Cus_Phone2',12)->nullable();;
            $table->date('Cus_DOB');
            $table->string('Cus_Remark',500);
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
        Schema::dropIfExists('customers');
    }
};
