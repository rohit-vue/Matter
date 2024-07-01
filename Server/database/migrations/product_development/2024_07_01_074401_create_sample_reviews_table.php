<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sample_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('version_id');
            $table->bigInteger('pom');
            $table->bigInteger('bom');
            $table->text('design_comments');
            $table->date('review_date');
            $table->bigInteger('reviewed_by');
            $table->string('status');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_reviews');
    }
};
