<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("tarif_id")->unsigned();
            $table->bigInteger("sales_id")->unsigned();
            $table->foreign('tarif_id')
                ->references("id")
                ->on("tarifs")->onDelete("cascade");
            $table->foreign('sales_id')
                ->references("id")
                ->on("sales")->onDelete("cascade");
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
        Schema::dropIfExists('tarif_sales');
    }
}
