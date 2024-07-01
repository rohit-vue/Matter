<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('season_id');
            $table->string('stage');
            $table->string('mfg_stage');
            $table->date('ship_date');
            $table->json('components');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('versions');
    }
};
