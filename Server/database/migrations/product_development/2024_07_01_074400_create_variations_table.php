<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('version_id');
            $table->string('colorway');
            $table->string('fabrication');
            $table->string('other_variation_details');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
