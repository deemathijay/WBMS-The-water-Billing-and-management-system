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
        Schema::create('pricing__methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Org_id');
            $table->foreign('Org_id')->references('id')->on('organization_details');
            $table->string('Method',1);
            $table->decimal('0_5',6,2);
            $table->decimal('6_10',6,2);
            $table->decimal('11_15',6,2);
            $table->decimal('16_20',6,2);
            $table->decimal('21_25',6,2);
            $table->decimal('26_30',6,2);
            $table->decimal('31_35',6,2);
            $table->decimal('36_40',6,2);
            $table->decimal('41_45',6,2);
            $table->decimal('46_50',6,2);
            $table->decimal('51_60',6,2);
            $table->decimal('61_70',6,2);
            $table->decimal('71_80',6,2);
            $table->decimal('81_90',6,2);
            $table->decimal('91_100',6,2);
            $table->decimal('Over100',6,2);
            $table->decimal('GovTax',6,2);
            $table->decimal('ServiceCharge',6,2);
            $table->decimal('DiscountRate',6,2);
            $table->decimal('Interest',6,2);
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
        Schema::dropIfExists('pricing__methods');
    }
};
