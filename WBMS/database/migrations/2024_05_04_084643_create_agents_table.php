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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('Agt_id',12);
            $table->string('Agt_FullName',300);
            $table->string('Agt_NameInitials',100);
            $table->string('Agt_Address',300);
            $table->string('Agt_NIC',15);
            $table->string('Agt_Gender',2);
            $table->string('Agt_Phone1',12);
            $table->string('Agt_Phone2',12)->nullable();;
            $table->date('Agt_DOB');
            $table->string('Agt_Remark',500);
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
        Schema::dropIfExists('agents');
    }
};
