<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('variation_id');
            $table->string('activity_type');
            $table->bigInteger('user_id');
            $table->date('activity_date');
            $table->text('details');
            $table->date('task_due_date');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
