<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('point_of_measures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('version_id');
            $table->string('description');
            $table->bigInteger('value');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('point_of_measures');
    }
};
