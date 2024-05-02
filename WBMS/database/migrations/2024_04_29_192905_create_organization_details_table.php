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
        Schema::create('organization_details', function (Blueprint $table) {
            $table->id();
            $table->longText('Org_Name');
            $table->longText('Org_Address');
            $table->longText('Org_POC');
            $table->integer('Org_POCNumber');
            $table->integer('Org_TeleNumber');
            $table->longText('Org_Remark');
            $table->longText('Org_UserName');
            $table->longText('Org_Password');
            $table->longText('Org_status');
            $table->longText('Org_DBName');
            $table->longText('Org_DBPWD');

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
        Schema::dropIfExists('organization_details');
    }
};
