<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("livreur_id")->unsigned();
            $table->integer("quantity");
            $table->decimal("total_price")->default(0);
            $table->decimal("total_received")->default(0);
            $table->decimal("change")->default(0);
            $table->string("payment_type")->default("cash");
            $table->string("payment_status")->default("paid");
            $table->timestamps();
            $table->foreign('livreur_id')
                ->references("id")
                ->on("livreurs")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
