<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_stock', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("stock_id")->unsigned();
            $table->bigInteger("sales_id")->unsigned();


            $table->foreign('stock_id')
                ->references("id")
                ->on("stock")->onDelete("cascade");
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
        Schema::dropIfExists('sales_stock');
    }
}
