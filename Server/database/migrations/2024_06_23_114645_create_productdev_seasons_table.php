<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDevSeasonsTable   extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdev_seasons', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('sku');
            $table->string('style_name');
            $table->string('color');
            $table->string('dev_stage');
            $table->string('category');
            $table->string('mfg');
            $table->string('mfg_stage');
            $table->date('ship_date');
            $table->string('updates_brand');
            $table->string('updates_mfg');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdev_seasons');
    }
}
